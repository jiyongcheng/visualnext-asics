<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 10/17/16
 * Time: 6:52 PM
 */

class Visual_News_Model_Mysql4_News extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('news/news','news_id');
    }
}