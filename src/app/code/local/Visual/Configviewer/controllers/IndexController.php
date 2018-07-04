<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition License
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magentocommerce.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Enterprise
 * @package     Enterprise_CustomerBalance
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */

/**
 * Customerbalance controller for My Account
 *
 */
class Visual_Configviewer_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
//        Mage::log('here');
//        $file = Mage::getBaseDir('var').DS.time().'.xml';
//        echo $file;
//        file_put_contents(Mage::getBaseDir('var').'/test.xml','aa');
//        if (!Mage::helper('enterprise_customerbalance')->isEnabled()) {
//            $this->_redirect('customer/account/');
//            return;
//        }
//        $this->loadLayout();
//        $this->_initLayoutMessages('customer/session');
//        $this->loadLayoutUpdates();
//        $headBlock = $this->getLayout()->getBlock('head');
//        if ($headBlock) {
//            $headBlock->setTitle(Mage::helper('enterprise_customerbalance')->__('Store Credit'));
//        }
//        $this->renderLayout();
    }
}
