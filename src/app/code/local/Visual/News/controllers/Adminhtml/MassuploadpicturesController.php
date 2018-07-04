<?php
class Visual_News_Adminhtml_MassuploadpicturesController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction(){
        $this->loadLayout();
//        $this->_setActiveMenu('catalog/products');
        $this->_addContent(
            $this->getLayout()->createBlock('news/adminhtml_massuploadpictures_edit')

        );
        $this->_addLeft($this->getLayout()->createBlock('news/adminhtml_massuploadpictures_edit_tabs'));
        $this->_initLayoutMessages('catalog/session');
        $this->renderLayout();
    }

    public function saveProductImgsAction() {
        $enablev2Method = Mage::getStoreConfig('catalog/image_tool/enable_v2');
        if($enablev2Method) {
            $images = Mage::helper('glscatalog/image')->getImagesInfosV2();
            if (!empty($images)) {
                Mage::helper('glscatalog/image')->bindImagesWithProductV2($images);
            } else {
                Mage::getSingleton('catalog/session')->addError('no image infomation or some error happen when get image information during save product images');
            }
        }else {
            $images = Mage::helper('glscatalog')->getImagesInfosAction();
            if (!empty($images)) {
                Mage::helper('glscatalog')->bindImagesWithProduct($images);
            } else {
                Mage::getSingleton('catalog/session')->addError('no image infomation or some error happen when get image information during save product images');
            }
        }

        $this->_redirect('*/*');
    }

    public function saveAction() {
        try {
            $uploader = new Varien_File_Uploader('images_zip');
            $uploader->setAllowedExtensions(array('zip'));
            $path = Mage::app()->getConfig()->getTempVarDir().'/import/';
            try {
                $result = $uploader->save($path);
                if ($uploadFile = $uploader->getUploadedFileName()) {
                    Mage::getSingleton('catalog/session')->addNotice('files upload success and is putted in '.$path.$uploadFile);
                    Mage::helper('glscatalog')->unzipImgFiles($path.$uploadFile);
                } else {
                    Mage::getSingleton('catalog/session')->addError($this->__('Cannot get file name'));
                }
            } catch (Exception $e) {
                Mage::getSingleton('catalog/session')->addError($e->getMessage());
            }
        }catch(Exception $e) {
            Mage::getSingleton('catalog/session')->addError($this->__($e->getMessage()));
        }
        
        $this->_redirect('*/*');
    }


}

