<?php
class Visual_News_Block_Adminhtml_News_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $model = Mage::registry('news_data');

        $form = new Varien_Data_Form();

//        $form = new Varien_Data_Form(
//            array('id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post')
//        );

        $fieldset = $form->addFieldset('news_form',
            array('legend'=>Mage::helper('news')->__('News information')));

        if ($model->getNewsId()) {
            $fieldset->addField('news_id', 'hidden', array(
                'name' => 'news_id',
            ));
        }
        $fieldset->addField('title', 'text', array(
            'name' => 'title',
            'label' => Mage::helper('news')->__('News Title'),
            'title' => Mage::helper('news')->__('News Title'),
            'required' => true,
        ));

        $fieldset->addField('is_active', 'select', array(
            'name' => 'is_active',
            'label' => Mage::helper('news')->__('Status'),
            'title' => Mage::helper('news')->__('News Status'),
            'required' => true,
            'options' => $model->getAvailableStatuses(),
        ));

        $fieldset->addField('content', 'editor', array(
            'name' => 'content',
            'label' => Mage::helper('news')->__('Content'),
            'title' => Mage::helper('news')->__('Content'),
            'required' => true,
            'style' => 'width:700px; height:300px;',
        ));

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}