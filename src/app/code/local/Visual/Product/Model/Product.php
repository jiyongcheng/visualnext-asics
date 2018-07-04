<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 10/11/16
 * Time: 5:29 PM
 */

class Visual_Product_Model_Product extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('product/product');
    }
}