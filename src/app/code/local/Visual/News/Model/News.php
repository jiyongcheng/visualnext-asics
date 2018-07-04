<?php

class Visual_News_Model_News extends Mage_Core_Model_Abstract
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function _construct()
    {
        parent::_construct();
        $this->_init('news/news');
    }

    public function getAvailableStatuses()
    {
        $statuses = new Varien_Object(array(
            self::STATUS_ENABLED => Mage::helper('news')->__('Enabled'),
            self::STATUS_DISABLED => Mage::helper('news')->__('Disabled'),
        ));

        return $statuses->getData();
    }

    public function getStatusesOptionsArray()
    {
        return array(
            array(
                'label' => Mage::helper('news')->__('Enabled'),
                'value' => self::STATUS_ENABLED
            ),
            array(
                'label' => Mage::helper('news')->__('Disabled'),
                'value' => self::STATUS_DISABLED
            )
        );
    }
}