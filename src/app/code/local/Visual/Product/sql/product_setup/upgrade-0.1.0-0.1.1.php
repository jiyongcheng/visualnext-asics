<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @copyright  Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();
$setup->addAttribute('catalog_product', 'ipc', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'IPC',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'division_code', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Division Code',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'class', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Class',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'class_description', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Class Description',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'collection', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Collection',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'collection_description', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Collection Description',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));


$setup->addAttribute('catalog_product', 'selling_period', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Selling Period',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));


$setup->addAttribute('catalog_product', 'type_group', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Type Group',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'type_name', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Type Name',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'type_description', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Type Description',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'group', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Group',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

//$setup->addAttribute('catalog_product', 'country_of_origin', array(
//    'group'         => 'Special Attributes',
//    'input'         => 'text',
//    'type'          => 'text',
//    'label'         => 'Country Of Origin',
//    'backend'       => '',
//    'visible'       => 1,
//    'required'        => 0,
//    'user_defined' => 1,
//    'searchable' => 1,
//    'filterable' => 0,
//    'comparable'    => 1,
//    'visible_on_front' => 1,
//    'visible_in_advanced_search'  => 0,
//    'is_html_allowed_on_front' => 0,
//    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
//));

$setup->addAttribute('catalog_product', 'package', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Package',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'length', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Length',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'width', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Width',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'height', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Height',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));


$setup->addAttribute('catalog_product', 'is_gift_card', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Is Gift Card',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));


$setup->addAttribute('catalog_product', 'product_code', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Product Code',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'composition', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Composition',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'rn_number', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'RN Number',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'hts_code', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'HTS Code',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'visual_stock_id', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Stock Id',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'stock_code', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Stock Code',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'product_category', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Category',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));


$setup->addAttribute('catalog_product', 'at_ship', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'AT Ship',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));


$setup->addAttribute('catalog_product', 'at_sell', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'AT Sell',
    'backend'       => '',
    'visible'       => 1,
    'required'        => 0,
    'user_defined' => 1,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$installer->endSetup();