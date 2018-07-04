<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 10/11/16
 * Time: 5:33 PM
 */

class Visual_Product_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function test()
    {
        echo 'hello world';
    }
    public function getAttributeId($name)	{
        $eavAttribute = new Mage_Eav_Model_Mysql4_Entity_Attribute();
        $code = $eavAttribute->getIdByCode('catalog_product', $name);
        echo "\n attribute id = " . $code;
        return $code;
    }

    function getOptionId($attribute_code,$label)
    {
        $attribute_model = Mage::getModel('eav/entity_attribute');
        $attribute_options_model= Mage::getModel('eav/entity_attribute_source_table') ;
        $attribute_code = $attribute_model->getIdByCode('catalog_product', $attribute_code);
        $attribute = $attribute_model->load($attribute_code);

        $attribute_options_model->setAttribute($attribute);
        $options = $attribute_options_model->getAllOptions(false);

        foreach($options as $option)
        {
            if ($option['label'] == $label)
            {
                $optionId=$option['value'];
                break;
            }
        }
        return $optionId;
    }

    public function getAttributeSetId($attributeSetName='Default')
    {
        $defaultAttributeSetId = null;
        $entityType = Mage::getModel('catalog/product')->getResource()->getTypeId();
        $attributeSetCollection = Mage::getModel("eav/entity_attribute_set")->getCollection()
            ->setEntityTypeFilter($entityType)
            ->addFieldToFilter("attribute_set_name", $attributeSetName)
        ;
        $defaultAttributeSet = $attributeSetCollection->getFirstItem();

        if(!empty($defaultAttributeSet)) {
            $defaultAttributeSetId = $defaultAttributeSet->getAttributeSetId();
        }

        return $defaultAttributeSetId;
    }

    public function getFrontStoreWebsiteId()
    {
        $webSiteId =  Mage::app()->getStore(Mage_Core_Model_App::DISTRO_STORE_ID)->getWebsiteId();
        return $webSiteId;
    }


    public function createSimpleProduct($productData=array())
    {
        Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
        $storeId = 4;
        $webSiteId =  $this->getFrontStoreWebsiteId();
        $simpleProduct = Mage::getModel('catalog/product');
        $productDefaultAttributeSetId = $this->getAttributeSetId();
        $manufacturerOptionId = $this->getOptionId('manufacturer',$productData['manufacturer']);
        $colorOptionId = $this->getOptionId('color',$productData['color']);
        $sizeOptionId = $this->getOptionId('size',$productData['size']);
        $categories = array(3);
        $qty = 999;

        try {
            $simpleProduct
                //->setStoreId($storeId) //you can set data in store scope
                ->setWebsiteIds(array($webSiteId)) //website ID the product is assigned to, as an array
                ->setAttributeSetId($productDefaultAttributeSetId) //ID of a attribute set named 'default'
                ->setTypeId('simple') //product type
                ->setCreatedAt(strtotime('now')) //product creation time
                ->setUpdatedAt(strtotime('now')) //product update time
                ->setSku($productData['sku']) //SKU
                ->setName($productData['product_title']) //product name
                ->setWeight($productData['weight'])

                ;

            $simpleProduct->setStatus(Mage_Catalog_Model_Product_Status::STATUS_ENABLED); //product status (1 - enabled, 2 - disabled)

            $simpleProduct->setTaxClassId(4); //tax class (0 - none, 1 - default, 2 - taxable, 4 - shipping)

            $simpleProduct->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_NOT_VISIBLE); //catalog and search visibility

            if($manufacturerOptionId) {
                $simpleProduct->setManufacturer($manufacturerOptionId); //manufacturer id
            }

            if($colorOptionId) {
                $simpleProduct->setColor($colorOptionId);
            }

//            $simpleProduct
//                ->setNewsFromDate('06/26/2014') //product set as new from
//                ->setNewsToDate('06/30/2014'); //product set as new to

            $simpleProduct->setCountryOfManufacture($productData['country_of_origin']); //country of manufacture (2-letter country code)


            $simpleProduct
                ->setPrice($productData['price']) //price in form 11.22
                ->setCost($productData['cost']) //price in form 11.22
            ;
//            $simpleProduct
//                ->setSpecialPrice($productData['special_price']) //special price in form 11.22
//                ->setSpecialFromDate('06/1/2014') //special price from (MM-DD-YYYY)
//                ->setSpecialToDate('06/30/2014') //special price to (MM-DD-YYYY)
//            ;

            $simpleProduct
                ->setMsrpEnabled(1) //enable MAP
                ->setMsrpDisplayActualPriceType(1) //display actual price (1 - on gesture, 2 - in cart, 3 - before order confirmation, 4 - use config)
                ->setMsrp($productData['msrp']) //Manufacturer's Suggested Retail Price
            ;

            $simpleProduct
                ->setMetaTitle($productData['web_hash_tag'])
                ->setMetaKeyword($productData['web_hash_tag'])
                ->setMetaDescription($productData['web_hash_tag'])
                ->setDescription($productData['web_description'])
                ->setShortDescription($productData['web_description'])
                ;

            $simpleProduct->setStockData(array(
                    'use_config_manage_stock' => 0, //'Use config settings' checkbox
                    'manage_stock' => 1, //manage stock
                    'min_sale_qty' => 1, //Minimum Qty Allowed in Shopping Cart
                    'max_sale_qty' => 100, //Maximum Qty Allowed in Shopping Cart
                    'is_in_stock' => 1, //Stock Availability
                    'qty' => $qty //qty
                )
            );
            //assign product to categories
            $simpleProduct->setCategoryIds($categories);
            $images = array(
                'small_image' => 'http://h.hiphotos.baidu.com/zhidao/pic/item/b90e7bec54e736d1785091fb99504fc2d4626985.jpg'
            );
            if($productData['image_link']) {
                $images['thumbnail'] = $productData['image_link'];
            }
            if($productData['back_image_link']) {
                $images['image'] = $productData['back_image_link'];
            }

            $simpleProduct = $this->addProductImages($simpleProduct,$images);


            //other attributes

            $simpleProduct
                ->setUpc($productData['upc'])
                ->setIpc($productData['ipc'])
                ->setDivisionCode($productData['division_code'])
                ->setClass($productData['class'])
                ->setClassDescription($productData['class_description'])
                ->setCollection($productData['collection'])
                ->setCollectionDescription($productData['collection_description'])
                ->setSellingPeriod($productData['selling_period'])
                ->setTypeGroup($productData['type_group'])
                ->setTypeName($productData['type_name'])
                ->setTypeDescription($productData['type_description'])
                ->setGroup($productData['group'])
                //->setPackage($productData['package'])

                ->setLength($productData['length'])
                ->setWidth($productData['width'])
                ->setHeight($productData['height'])
                ->setIsGiftCard($productData['is_gift_card'])
                ->setProductCode($productData['product_code'])
                ->setComposition($productData['composition'])
                ->setRnNumber($productData['rn_number'])
                ->setHtsCode($productData['hts_code'])
                ->setStockId($productData['stock_id'])
                ->setStockCode($productData['stock_code'])
                ->setProductCategory($productData['product_category'])
                ->setSafetyQty($productData['safety_qty'])
                ->setAtShip($productData['at_ship'])
                ->setAtSell($productData['at_sell'])
            ;

            $simpleProduct->save();


            /** EXTERNAL IMAGE IMPORT - END **/

            $simpleProductId = $simpleProduct->getId();
            Mage::log('create new product:'.$simpleProductId);
//            $simpleProduct2 = Mage::getModel('catalog/product')->load($simpleProductId);
//            $simpleProduct2
//                ->setStoreId(1)
//                ->setDescription('default store view')
//                ->setName('haha')
//            ;
//            $simpleProduct2->save();
            return $simpleProductId;
        } catch (Exception $e) {
            Mage::log($e->getMessage());
            echo $e->getMessage();
        }
    }

    public function updateSimpleProduct($productData=array())
    {
//        Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
        $storeId = 1;
        $sku = $productData['sku'];
        $product = Mage::getModel('catalog/product')->loadByAttribute('sku',$sku);
        $qty=2;
        try {
            $product->setStockData(array(
                    'use_config_manage_stock' => 0, //'Use config settings' checkbox
                    'manage_stock' => 1, //manage stock
                    'min_sale_qty' => 1, //Minimum Qty Allowed in Shopping Cart
                    'max_sale_qty' => 100, //Maximum Qty Allowed in Shopping Cart
                    'is_in_stock' => 1, //Stock Availability
                    'qty' => $qty //qty
                )
            );

            Mage::log('update product:'.$product->getId());

        } catch (Exception $e) {
            Mage::log($e->getMessage());
            echo $e->getMessage();
        }
    }

    public function addProductImages($product,$images)
    {
        $sku = $product->getSku();
        foreach($images as $key=>$image_url) {
            /** EXTERNAL IMAGE IMPORT - START **/

            //get external image url from csv
            $image_type = substr(strrchr($image_url,"."),1); //find the image extension
            $filename   = md5($image_url . $sku).'.'.$image_type; //give a new name, you can modify as per your requirement
            $filepath   = Mage::getBaseDir('media') . DS . 'import'. DS . $filename; //path for temp storage folder: ./media/import/
            file_put_contents($filepath, file_get_contents(trim($image_url))); //store the image from external url to the temp storage folder
//            $mediaAttribute = array (
//                'thumbnail',
//                'small_image',
//                'image'
//            );
            $mediaAttribute = array (
                $key
            );
            /**
             * Add image to media gallery
             *
             * @param string        $file              file path of image in file system
             * @param string|array  $mediaAttribute    code of attribute with type 'media_image',
             *                                         leave blank if image should be only in gallery
             * @param boolean       $move              if true, it will move source file
             * @param boolean       $exclude           mark image as disabled in product page view
             */
            $product->addImageToMediaGallery($filepath, $mediaAttribute, false, false);

            /** EXTERNAL IMAGE IMPORT - END **/

        }

        return $product;
    }


    public function createConfigurableProduct($products)
    {

        // Store some data for later once we've created the configurable product, so we can
        // associate this simple product to it later..
        $configurable_attribute = "color";
        $attr_id = 92;
        $configurableAttributeOptionId = 3;
        $attr_value = 'red';
        $simpleProducts = array();
        foreach($products as $productItems) {
            foreach($productItems as $simpleProductId) {
                array_push($simpleProducts,
                    array(
                        "id" => $simpleProductId,
                        "price" => 22,
                        "attr_code" => $configurable_attribute,
                        "attr_id" => $attr_id,
                        "value" => $configurableAttributeOptionId,
                        "label" => $attr_value
                    )
                );
            }
        }



        //Mage::log($simpleProducts);
        $configProduct = Mage::getModel('catalog/product');
        try {
            $currentWebSiteId = $this->getFrontStoreWebsiteId();
            $websiteIds = array($currentWebSiteId);
            $productDefaultAttributeSetId = $this->getAttributeSetId();
            $sku = 'sku-configurable-'.rand(1,1000);
            $productName = 'configurable product '.$sku;
            $weight = 4;
            $manufacturerId = $this->getOptionId('manufacturer','China');
            $colorId = $this->getOptionId('color','red');
            $manufacturerAttributeId = $this->getAttributeId('manufacturer');
            $colorAttributeId = $this->getAttributeId('color');
            $country = 'AF';
            $price = '22.22';
            $cost = '11.11';
            $specialPrice= '0.44';
            $categories = array(3);




            $configProduct
                //->setStoreId(1) //you can set data in store scope
                //->setWebsiteIds($websiteIds) //website ID the product is assigned to, as an array
                ->setAttributeSetId($productDefaultAttributeSetId) //ID of a attribute set named 'default'
                ->setTypeId('configurable') //product type
                ->setCreatedAt(strtotime('now')) //product creation time
//    ->setUpdatedAt(strtotime('now')) //product update time
                ->setSku($sku) //SKU
                ->setName($productName) //product name
                ->setWeight($weight)
                ->setStatus(1) //product status (1 - enabled, 2 - disabled)
                ->setTaxClassId(4) //tax class (0 - none, 1 - default, 2 - taxable, 4 - shipping)
                ->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH) //catalog and search visibility
                //->setManufacturer($manufacturerId) //manufacturer id
//                ->setNewsFromDate('06/26/2014') //product set as new from
//                ->setNewsToDate('06/30/2014') //product set as new to
                ->setCountryOfManufacture($country) //country of manufacture (2-letter country code)
                ->setPrice($price) //price in form 11.22
                ->setCost($cost) //price in form 11.22
                ->setSpecialPrice($specialPrice) //special price in form 11.22
//                ->setSpecialFromDate('06/1/2014') //special price from (MM-DD-YYYY)
//                ->setSpecialToDate('06/30/2014') //special price to (MM-DD-YYYY)
                ->setMsrpEnabled(1) //enable MAP
                ->setMsrpDisplayActualPriceType(1) //display actual price (1 - on gesture, 2 - in cart, 3 - before order confirmation, 4 - use config)
                ->setMsrp(99.99) //Manufacturer's Suggested Retail Price
                ->setMetaTitle('test meta title 2')
                ->setMetaKeyword('test meta keyword 2')
                ->setMetaDescription('test meta description 2')
                ->setDescription('This is a long description')
                ->setShortDescription('This is a short description')
                ->setMediaGallery(array('images' => array(), 'values' => array())) //media gallery initialization
                ->setStockData(array(
                        'use_config_manage_stock' => 0, //'Use config settings' checkbox
                        'manage_stock' => 1, //manage stock
                        'is_in_stock' => 1, //Stock Availability
                    )
                )
                ->setCategoryIds($categories) //assign product to categories
            ;

            $configProduct->setCanSaveConfigurableAttributes(true);
            $configProduct->setCanSaveCustomOptions(true);
            $cProductTypeInstance = $configProduct->getTypeInstance();
            $cProductTypeInstance->setUsedProductAttributeIds(array($colorAttributeId));
            // Now we need to get the information back in Magento's own format, and add bits of data to what it gives us..
            $attributes_array = $cProductTypeInstance->getConfigurableAttributesAsArray();

            foreach($attributes_array as $key => $attribute_array) {
                $attributes_array[$key]['use_default'] = 1;
                $attributes_array[$key]['position'] = 0;
                if (isset($attribute_array['frontend_label'])) {
                    $attributes_array[$key]['label'] = $attribute_array['frontend_label'];
                } else {
                    $attributes_array[$key]['label'] = $attribute_array['attribute_code'];
                }
            }
            // Add it back to the configurable product..
            $configProduct->setConfigurableAttributesData($attributes_array);

            // Remember that $simpleProducts array we created earlier? Now we need that data..
            $dataArray = array();

            Mage::log('attributes array');
            //Mage::log($attributes_array);
            foreach ($simpleProducts as $simpleArray) {
                $dataArray[$simpleArray['id']] = array();
                foreach ($attributes_array as $attrArray) {
                    array_push(
                        $dataArray[$simpleArray['id']],
                        array(
                            "attribute_id" => $simpleArray['attr_id'],
                            "label" => $simpleArray['label'],
                            "is_percent" => false,
                            "pricing_value" => $simpleArray['price']
                        )
                    );
                }
            }

            // This tells Magento to associate the given simple products to this configurable product..
            //


            $configProduct->setConfigurableProductsData($dataArray);

            // Set stock data. Yes, it needs stock data. No qty, but we need to tell it to manage stock, and that it's actually
            // in stock, else we'll end up with problems later..
            $configProduct->setStockData(array(
                'use_config_manage_stock' => 1,
                'is_in_stock' => 1,
                'is_salable' => 1
            ));


            $configProduct = $this->addProductImages($configProduct);

            $configProduct->save();


            echo 'success:'.$configProduct->getId();
        } catch (Exception $e) {
            Mage::log($e->getMessage());
            echo $e->getMessage();
        }
    }


}