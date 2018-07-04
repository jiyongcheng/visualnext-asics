<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 10/17/16
 * Time: 6:54 PM
 */

class Visual_News_Model_Mysql4_News_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('news/news');
    }
}