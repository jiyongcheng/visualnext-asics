<?php

class Visual_Product_Block_Adminhtml_Update_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'product';
        $this->_controller = 'adminhtml_update';

        parent::__construct();

        //$this->_updateButton('save', 'label', Mage::helper('news')->__('Update Products'));
        //$this->_updateButton('delete', 'label', Mage::helper('news')->__('Delete News'));
        $this->_updateButton('reset', 'style', 'display:none');
    }

    public function getHeaderText()
    {
        return Mage::helper('adminhtml')->__('Upload Products');
    }
}
