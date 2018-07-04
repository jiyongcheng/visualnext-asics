<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 10/17/16
 * Time: 7:00 PM
 */

class Visual_News_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}