<?php

class Visual_Product_Block_Adminhtml_Import_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('product_import_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('adminhtml')->__('Product Mass Upload'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('upload', array(
            'label'     => Mage::helper('adminhtml')->__('Upload File'),
            'content'   => $this->getLayout()->createBlock('product/adminhtml_import_edit_tab_upload')->toHtml(),
        ));
        return parent::_beforeToHtml();
    }
}
