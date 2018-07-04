<?php
class Visual_Product_Adminhtml_UpdateController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function newAction()
    {
        $this->_title($this->__('Import Products'));

        $this->loadLayout();
        $this->_setActiveMenu('catalog/product');
        $this->_addBreadcrumb(Mage::helper('adminhtml')->__('News Manager'), Mage::helper('adminhtml')->__('Product Manager'), $this->getUrl('*/*/'));
        $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Edit News'), Mage::helper('adminhtml')->__('Edit Product'));

        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
        $this->_addContent($this->getLayout()->createBlock('product/adminhtml_update_edit'));
        $this->_addLeft($this->getLayout()->createBlock('product/adminhtml_update_edit_tabs'));

        $this->renderLayout();
    }

    public function saveAction() {
        try {
            $uploader = new Varien_File_Uploader('products');
            $uploader->setAllowedExtensions(array('csv'));
            $path = Mage::app()->getConfig()->getTempVarDir().'/import/';
            try {
                $result = $uploader->save($path);
                $uploadFile = $uploader->getUploadedFileName();
                if ($uploadFile) {
                    Mage::getSingleton('catalog/session')->addNotice('files upload success and is putted in '.$path.$uploadFile);
                    $filepath = $path.$uploadFile;
                    $csvAdapter = Mage::getModel('ImportExport/import_adapter_csv', $filepath);

                    while($csvAdapter->valid())
                    {
                        $data = $csvAdapter->current(); //get current line point

                        $product = array(
                            'prod_row_no' => $data['ProdRowNo'],
                            'sku' => $data['sku'],
                            'upc' => $data['Upc'],
                            'ipc' => $data['Ipc'],
                            'division_code' => $data['DivisionCode'],
                            'product_title' => $data['ProductTitle_en'],
                            'class' => $data['Class'],
                            'class_description' => $data['Class_Description'],
                            'collection' => $data['Collection'],
                            'collection_description' => $data['Collection_Description'],
                            'selling_period' => $data['SellingPeriod'],
                            'type_group' => $data['TypeGroup'],
                            'type_name' => $data['Type_Name2'],
                            'type_description' => $data['Type_Description2'],
                            'group' => $data['Group'],
                            'country_of_origin' => $data['CountryOfOrigin'],
                            'package' => $data['Package'],
                            'length' => $data['Length'],
                            'width' => $data['Width'],
                            'height' => $data['Height'],
                            'weight' => $data['Weight'],
                            'is_gift_card' => $data['IsGiftCard'],
                            'product_code' => $data['Product_code'],
                            'web_description' => $data['WebDescription'],
                            'web_hash_tag' => $data['WebHashTag'],
                            'composition' => $data['Composition_en'],
                            'manufacturer' => $data['Manufacturer'],
                            'rn_number' => $data['RN_Number'],
                            'hts_code' => $data['HTSCode'],
                            'color' => $data['Color_en'],
                            'size' => $data['SizeName'],
                            'stock_id' => $data['StockId'],
                            'cost' => $data['cost'],
                            'price' => $data['price'],
                            'msrp' => $data['msrp'],
                            'stock_code' => $data['StockCode'],
                            'product_category' => $data['Category'],
                            'image_link' => $data['imagelink'],
                            'back_image_link' => $data['Back_Imglink'],
                            'safety_qty' => $data['SafetyQty'],
                            'at_ship' => $data['ATShip'],
                            'at_sell' => $data['ATSell'],
                        );
                        Mage::helper('product')->updateSimpleProduct($product);
                        $csvAdapter->next();   // to next line
                    }
                } else {
                    Mage::getSingleton('catalog/session')->addError($this->__('Cannot get file name'));
                }
            } catch (Exception $e) {
                Mage::getSingleton('catalog/session')->addError($e->getMessage());
            }
        }catch(Exception $e) {
            Mage::getSingleton('catalog/session')->addError($this->__($e->getMessage()));
        }

        //$this->_redirect('*/*/new');
    }
}