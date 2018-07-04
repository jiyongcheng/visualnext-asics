<?php

class Visual_Product_Block_Adminhtml_Import_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
//        $this->_objectId = 'id';
//        $this->_controller = 'adminhtml_import';
//        parent::__construct();
//        $this->_updateButton('reset', 'style', 'display:none');
//        $this->_updateButton('back', 'style', 'display:none');
//        $this->_updateButton('save', 'style', 'display:none');
//        $this->_addButton('savecontinue', array(
//            'label' => Mage::helper('adminhtml')->__('Upload Zip Files'),
//            'onclick' => "$('edit_form').action += 'continue/true/'; editForm.submit();",
//            'class' => 'save',
//        ), -1);
//        $this->_addButton('Save Products Images', array(
//            'label'     => Mage::helper('adminhtml')->__('Save Products Images'),
//            'onclick'   => 'setLocation(\'' . $this->getUrl('*/*/saveProductImgs') . '\')',
//            'class'     => 'save',
//        ), -1);

        $this->_objectId = 'id';
        $this->_blockGroup = 'product';
        $this->_controller = 'adminhtml_import';

        parent::__construct();

        //$this->_updateButton('save', 'label', Mage::helper('news')->__('Import Products'));
        //$this->_updateButton('delete', 'label', Mage::helper('news')->__('Delete News'));
        $this->_updateButton('reset', 'style', 'display:none');
    }

    public function getHeaderText()
    {
        return Mage::helper('adminhtml')->__('Upload Products');
    }
}
