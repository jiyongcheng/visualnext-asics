<?php
class Visual_CustomCheckout_Model_Observer
{
    /**
     * Event Hook: checkout_onepage_controller_success_action
     * @param $observer Varien_Event_Observer
     */
    public function callOrderApiAfterPaidSuccess($observer)
    {
        Mage::log("begin callOrderApi");
        $event = $observer->getEvent();
        $invoice = $event->getInvoice();
        $order = $invoice->getOrder();
        $accessToken = $this->getAccessToken();
        $url = 'http://app.visual-2000.com/Asics_VIS/api/order';
        $parameters = $this->getOrderInfoById($order->getId());
        $output = $this->http_post($url,$parameters,$accessToken);
        $result = json_decode($output,true);
        Mage::log("the json is:".$parameters);
        Mage::log("the result:".$result);
        Mage::log("Exit callOrderApi");
    }

    public function orderApi($parameters)
    {
        Mage::log("begin request erp order api");
        $accessToken = $this->getAccessToken();
        $url = 'http://app.visual-2000.com/Asics_VIS/api/order';
        $output = $this->http_post($url,$parameters,$accessToken);
        $result = json_decode($output,true);
        Mage::log("the result:".$result);
        return $result;
    }

    public function getAccessToken()
    {
        $url = 'http://app.visual-2000.com/Asics_VIS/token';
        $body = 'grant_type=password&username=asicsapi@visual2000.com&password=Password2@';

        $result = $this->http_post($url,$body);
        $data = json_decode($result,true);
        $accessToken = '';
        if(isset($data['access_token'])) {
            $accessToken = $data['access_token'];
        }

        return $accessToken;
    }

    public function http_post($url,$parameters,$accessToken=null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0 );
        curl_setopt($ch, CURLOPT_POST, 1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        $header = array();
        $header [] = 'Content-Type:application/json; charset=utf-8';
        $header [] = 'Authorization: Bearer ' . $accessToken;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    public function getOrderInfoById($orderId){
        $order = Mage::getModel('sales/order')->load($orderId);
        $customerId = $order->getCustomerId();
        $incrementId = $order->getIncrementId();
        $orderCreatedAt = $order->getCreatedAt();
        $orderUpdatedAt = $order->getUpdatedAt();
        $currencyCode = $order->getStoreCurrencyCode();
        $customer = array(
            "IntegrationId"=> null,
            "CustomerCode"=> "web001", //???看客户
            "CreateCustomerIfNotFound"=> true
        );
        $taxRate = $order['tax_amount'];
        $orderItems = array();
        foreach($order->getAllVisibleItems() as $item){
            $product = Mage::getModel('catalog/product')->load($item->getProductId()); // getting product details here to get description

//            $taxClassId = $product->getData("tax_class_id");
//            $taxClass = $product->getData("tax_class_name");

            $orderItem = array(
                "UPCCode"=> $product->getData('upc'),
                "Quantity"=> $item->getQtyOrdered(),
                "Price"=> $item->getPrice(),
                "Tax1"=> 0,
                "Tax1Rate"=> $taxRate,
                "Tax2"=> null,
                "Amount"=> $item->getPrice(),
                "AdditionalDiscountCode"=> null,
                "DiscountTypeValue"=> 0,
                "DiscountTypeId"=> 2,
                "DefaultValueSettingId"=> 3
            );
            array_push($orderItems,$orderItem);
        }


        $shippingAddress = $order->getShippingAddress();
        $billingAddress = $order->getBillingAddress();
        $shipToAddress=array(
            "IntegrationId"=> null,
            "StoreCode"=> null,
            "FirstName"=> $shippingAddress->getFirstname(),
            "LastName"=> $shippingAddress->getLastname(),
            "Address1"=> $shippingAddress->getStreet(),
            "Address2"=> "",
            "City"=> $shippingAddress->getCity(),
            "Country"=> $shippingAddress->getCountryId(),
            "State"=> $shippingAddress->getRegionId(),
            "Zip"=> $shippingAddress->getPostcode(),
            "PhoneNumber"=> $shippingAddress->getTelephone(),
            "Email"=> $shippingAddress->getEmail(),
            "IsAutoGenerateLicensePlate"=> false,
            "DefaultValueSettingId"=> 4,
            "GlobalId"=> "zhanzzz@gmail.com" //?????用户email
        );
        $billToAddress=array(
            "IntegrationId"=> null,
            "StoreCode"=> null,
            "FirstName"=> $billingAddress->getFirstname(),
            "LastName"=> $billingAddress->getLastname(),
            "Address1"=> $billingAddress->getStreet(),
            "Address2"=> "",
            "City"=> $billingAddress->getCity(),
            "Country"=> $billingAddress->getCountryId(),
            "State"=> $billingAddress->getRegionId(),
            "Zip"=> $billingAddress->getPostcode(),
            "PhoneNumber"=> $billingAddress->getTelephone(),
            "Email"=> $billingAddress->getEmail(),
            "IsAutoGenerateLicensePlate"=> false,
            "DefaultValueSettingId"=> 4,
            "GlobalId"=> "zhanzzz@gmail.com" //?????
        );

        $payment = $order->getPayment();

        $paymentInfo=array(
            "CustomerPONumber"=> "ASICS-Magento-".$orderId,//长度有限制，不能超过22个
            "IntegrationId"=> null,
            "PaymentDate"=> $orderUpdatedAt,
            "PaymentType"=> $payment->getMethod(),
            "CurrencyCode"=> $currencyCode,
            "Amount"=> $payment->getAmountOrdered(),
            "Authorization"=> "tok_19BOsQJ69QbREJbQ2xfwYK4J",
            "AuthorizationCode"=> "tok_19BOsQJ69QbREJbQ2xfwYK4J",
            "TransactionId"=> "ch_19BOsRJ69QbREJbQXu1MBvMc",
            "PaymentStatus"=> "success",
            "UserCode"=> null,
            "GatewayName"=> "stripe",
            "DeviceCode"=> null,
            "CreditCardNumber"=> "4242",
            "CreditCardCompany"=> "Visa",
            "SourceName"=> "web",
            "IsTest"=> true
        );
        $parameters  = array(
            "IntegrationId"=>null,
            "SONumber"=>null,
            "CustomerPO"=>"ASICS-Magento-".$orderId, //长度有限制，不能超过20个
            "OrderDate"=>$orderCreatedAt,
            "CancelDate"=>null,
            "Freight"=>$order->getShippingAmount(),
            "OrderStateId"=>1,
            "SubTotal"=>$order->getGrandTotal(),
            "Tax1"=>$order->getTaxAmount(),
            "Tax1Rate"=>0,
            "TotalAmount"=>$order->getSubtotal(),
            "Discount"=>$order->getDiscountAmount(),
            "AdditionalDiscountCode"=>null,
            "DiscountTypeValue"=>null,
            "DiscountTypeId"=>2,
            "EmployeeCode"=>null,
            "EmployeeId"=>0,
            "isCreditHold"=>false,
            "YsnTax1Freight"=>false,
            "YsnTax1Other"=>false,
            "YsnTax2Freight"=>false,
            "YsnTax2Other"=>false,
            "WebStoreCode"=>"Magento",
            "Customer"=>$customer,
            "DefaultValueSettingId"=> 2,
            "OrderItems"=>$orderItems,
            "ShipToAddress"=>$shipToAddress,
            "BillToAddress"=>$billToAddress,
            "PaymentInfos"=>array($paymentInfo),
            "TermCode"=> "Visa"
        );
        $parameters = json_encode($parameters);

        return $parameters;
    }


}  