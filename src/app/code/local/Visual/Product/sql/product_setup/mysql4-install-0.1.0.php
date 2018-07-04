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
/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();
/**
 * Adding Different Attributes
 */

// adding attribute group
$setup->addAttributeGroup('catalog_product', 'Default', 'Special Attributes', 1000);

// the attribute added will be displayed under the group/tab Special Attributes in product edit page
$setup->addAttribute('catalog_product', 'upc', array(
    'group'         => 'Special Attributes',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'UPC',
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


//$setup->addAttribute('catalog_product', 'delivery_date', array(
//    'group'         => 'Special Attributes',
//    'input'         => 'date',
//    'type'          => 'datetime',
//    'label'         => 'Delivery',
//    'backend'        => "eav/entity_attribute_backend_datetime",
//    'visible'       => 1,
//    'required'        => 0,
//    'user_defined' => 1,
//    'searchable' => 1,
//    'filterable' => 0,
//    'comparable'    => 0,
//    'visible_on_front' => 1,
//    'visible_in_advanced_search'  => 0,
//    'is_html_allowed_on_front' => 0,
//    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
//));

//
//$setup->addAttribute('catalog_product', 'test_attribute', array(
//    'label'             => 'Test',
//    'type'              => 'varchar',
//    'input'             => 'select',
//    'backend'           => 'eav/entity_attribute_backend_array',
//    'frontend'          => '',
//    'source'            => 'yourmodule/source_option',
//    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
//    'visible'           => true,
//    'required'          => true,
//    'user_defined'      => true,
//    'searchable'        => false,
//    'filterable'        => false,
//    'comparable'        => false,
//    'option'            => array ('value' => array('optionone' => array('Sony'),
//        'optiontwo' => array('Samsung'),
//        'optionthree' => array('Apple'),
//    )
//    ),
//    'visible_on_front'  => false,
//    'visible_in_advanced_search' => false,
//    'unique'            => false
//));


//$data = array(
//    'entity_type_id'            => $entityTypeId,
//    'attribute_code'            => $code,
//    'backend_model'             => $this->_getValue($attr, 'backend', ''),
//    'backend_type'              => $this->_getValue($attr, 'type', 'varchar'),
//    'backend_table'             => $this->_getValue($attr, 'table', ''),
//    'frontend_model'            => $this->_getValue($attr, 'frontend', ''),
//    'frontend_input'            => $this->_getValue($attr, 'input', 'text'),
//    'frontend_input_renderer'   => $this->_getValue($attr, 'input_renderer', ''),
//    'frontend_label'            => $this->_getValue($attr, 'label', ''),
//    'frontend_class'            => $this->_getValue($attr, 'frontend_class', ''),
//    'source_model'              => $this->_getValue($attr, 'source', ''),
//    'is_global'                 => $this->_getValue($attr, 'global', 1),
//    'is_visible'                => $this->_getValue($attr, 'visible', 1),
//    'is_required'               => $this->_getValue($attr, 'required', 1),
//    'is_user_defined'           => $this->_getValue($attr, 'user_defined', 0),
//    'default_value'             => $this->_getValue($attr, 'default', ''),
//    'is_searchable'             => $this->_getValue($attr, 'searchable', 0),
//    'is_filterable'             => $this->_getValue($attr, 'filterable', 0),
//    'is_comparable'             => $this->_getValue($attr, 'comparable', 0),
//    'is_visible_on_front'       => $this->_getValue($attr, 'visible_on_front', 0),
//    'is_html_allowed_on_front'  => $this->_getValue($attr, 'is_html_allowed_on_front', 0),
//    'is_visible_in_advanced_search'
//    => $this->_getValue($attr, 'visible_in_advanced_search', 0),
//    'is_used_for_price_rules'   => $this->_getValue($attr, 'used_for_price_rules', 1),
//    'is_filterable_in_search'   => $this->_getValue($attr, 'filterable_in_search', 0),
//    'used_in_product_listing'   => $this->_getValue($attr, 'used_in_product_listing', 0),
//    'used_for_sort_by'          => $this->_getValue($attr, 'used_for_sort_by', 0),
//    'is_unique'                 => $this->_getValue($attr, 'unique', 0),
//    'apply_to'                  => $this->_getValue($attr, 'apply_to', ''),
//    'is_configurable'           => $this->_getValue($attr, 'is_configurable', 1),
//    'note'                      => $this->_getValue($attr, 'note', ''),
//    'position'                  => $this->_getValue($attr, 'position', 0),
//);

$installer->endSetup();



