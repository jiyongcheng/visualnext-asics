<?php

class Visual_Product_Block_Adminhtml_Update_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('product_update_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('adminhtml')->__('Product Mass Upload'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('upload', array(
            'label'     => Mage::helper('adminhtml')->__('Upload File'),
            'content'   => $this->getLayout()->createBlock('product/adminhtml_update_edit_tab_upload')->toHtml(),
        ));
        return parent::_beforeToHtml();
    }
}
