<?php
/**
 * EMThemes
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade the framework to newer
 * versions in the future. If you wish to customize the framework for your
 * needs please refer to http://www.emthemes.com/ for more information.
 *
 * @category    EM
 * @package     EM_ThemeFramework
 * @copyright   Copyright (c) 2012 CodeSpot JSC. (http://www.emthemes.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author      Giao L. Trinh (giao.trinh@emthemes.com)
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();
/**
 * Create table 'themeframework/area'
 */
if(!$installer->tableExists($installer->getTable('themeframework/area'))){
	$table = $installer->getConnection()
		->newTable($installer->getTable('themeframework/area'))
		->addColumn('area_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
			'identity'  => true,
			'nullable'  => false,
			'primary'   => true,
			), 'Area ID')
		->addColumn('package_theme', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
			), 'Package Theme')
		->addColumn('layout', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
			), 'Layout')
		->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
			), 'Area Content')
		->addColumn('creation_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
			), 'Area Creation Time')
		->addColumn('update_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
			), 'Area Modification Time')
		->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
			'nullable'  => false,
			'default'   => '1',
			), 'Is Area Active')
		->setComment('EM ThemeFramework Area Table');
	$installer->getConnection()->createTable($table);
}

/**
 * Create table 'themeframework/area_store'
 */
if(!$installer->tableExists($installer->getTable('themeframework/area_store'))){
	$table = $installer->getConnection()
		->newTable($installer->getTable('themeframework/area_store'))
		->addColumn('area_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
			'nullable'  => false,
			'primary'   => true,
			), 'Area ID')
		->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
			'unsigned'  => true,
			'nullable'  => false,
			'primary'   => true,
			), 'Store ID')
		->addIndex($installer->getIdxName('themeframework/area_store', array('store_id')),
			array('store_id'))
		->addForeignKey($installer->getFkName('themeframework/area_store', 'area_id', 'themeframework/area', 'area_id'),
			'area_id', $installer->getTable('themeframework/area'), 'area_id',
			Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
		->addForeignKey($installer->getFkName('themeframework/area_store', 'store_id', 'core/store', 'store_id'),
			'store_id', $installer->getTable('core/store'), 'store_id',
			Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
		->setComment('EM ThemeFramework Area To Store Linkage Table');
	$installer->getConnection()->createTable($table);
}

/**
 * Create table 'themeframework/page'
 */
if(!$installer->tableExists($installer->getTable('themeframework/page'))){
	$table = $installer->getConnection()
		->newTable($installer->getTable('themeframework/page'))
		->addColumn('page_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
			'identity'  => true,
			'nullable'  => false,
			'primary'   => true,
			), 'Area ID')
		->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
			), 'Title')
		->addColumn('handle', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
			), 'Handle')	
		->addColumn('custom_handle', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
			), 'Custom Handle')	
		->addColumn('layout', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
			), 'Layout')
		->addColumn('layout_update_xml', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
			), 'Layout Update Xml')
		->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
			'nullable'  => false,
			'default'   => '1',
			), 'Status')
		->addColumn('sort', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
			'nullable'  => false,
			'default'   => '0',
			), 'Sort')	
		->setComment('EM ThemeFramework Page Table');
	$installer->getConnection()->createTable($table);
}

/**
 * Create table 'themeframework/page_store'
 */
if(!$installer->tableExists($installer->getTable('themeframework/page_store'))){ 
	$table = $installer->getConnection()
		->newTable($installer->getTable('themeframework/page_store'))
		->addColumn('page_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
			'nullable'  => false,
			'primary'   => true,
			), 'Area ID')
		->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
			'unsigned'  => true,
			'nullable'  => false,
			'primary'   => true,
			), 'Store ID')
		->addIndex($installer->getIdxName('themeframework/page_store', array('store_id')),
			array('store_id'))
		->addForeignKey($installer->getFkName('themeframework/page_store', 'page_id', 'themeframework/area', 'area_id'),
			'page_id', $installer->getTable('themeframework/page'), 'page_id',
			Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
		->addForeignKey($installer->getFkName('themeframework/page_store', 'store_id', 'core/store', 'store_id'),
			'store_id', $installer->getTable('core/store'), 'store_id',
			Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
		->setComment('EM ThemeFramework Page To Store Linkage Table');
	$installer->getConnection()->createTable($table);
}

/**
* Add Data 
*/
$model = Mage::getModel('themeframework/area');
	
$data = array(
	'package_theme'	=>	'default/em0059',
	'layout'	=>	'1column',	
	'content_decode'	=> unserialize(<<<EOB
a:3:{i:0;a:6:{s:10:"custom_css";s:10:"store_view";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:5:"area1";}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper-header">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:10:"header-fix";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"header";}}i:1;s:5:"clear";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper-content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:25:{i:0;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"main-slideshow";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area2";}}i:1;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:20:"top-banner-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area3";}}i:2;s:5:"clear";i:3;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:11:"breadcrumbs";}}i:4;s:5:"clear";i:5;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:39:"<div class="col-main">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:2:{i:0;s:15:"global_messages";i:1;s:7:"content";}}i:6;s:5:"clear";i:7;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:21:"home-banner-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area4";}}i:8;s:5:"clear";i:9;a:11:{s:6:"column";s:2:"14";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:13:"tab-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area5";}}i:10;a:11:{s:6:"column";s:2:"10";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:16:"editor-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area6";}}i:11;s:5:"clear";i:12;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area7";}}i:13;s:5:"clear";i:14;a:11:{s:6:"column";s:2:"10";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"blog-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area8";}}i:15;a:11:{s:6:"column";s:2:"14";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"info-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area9";}}i:16;s:5:"clear";i:17;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"payment-method";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area10";}}i:18;s:5:"clear";i:19;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"follow-us";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area11";}}i:20;s:5:"clear";i:21;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:10:"footer-end";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area12";}}i:22;s:5:"clear";i:23;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:8:"ajax-fix";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:15:"before_body_end";}}i:24;s:5:"clear";}}}
EOB
),
	'is_active' => 1
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'	=>	'default/em0059',
	'layout'	=>	'2columns-right',	
	'content_decode'	=> unserialize(<<<EOB
a:3:{i:0;a:6:{s:10:"custom_css";s:10:"store_view";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:5:"area1";}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper-header">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:10:"header-fix";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"header";}}i:1;s:5:"clear";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper-content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:26:{i:0;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"main-slideshow";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area2";}}i:1;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:20:"top-banner-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area3";}}i:2;s:5:"clear";i:3;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:11:"breadcrumbs";}}i:4;s:5:"clear";i:5;a:11:{s:6:"column";s:2:"18";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:39:"<div class="col-main">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:2:{i:0;s:15:"global_messages";i:1;s:7:"content";}}i:6;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:48:"<div class="col-right sidebar">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"right";}}i:7;s:5:"clear";i:8;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:21:"home-banner-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area4";}}i:9;s:5:"clear";i:10;a:11:{s:6:"column";s:2:"14";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:13:"tab-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area5";}}i:11;a:11:{s:6:"column";s:2:"10";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:16:"editor-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area6";}}i:12;s:5:"clear";i:13;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area7";}}i:14;s:5:"clear";i:15;a:11:{s:6:"column";s:2:"10";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"blog-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area8";}}i:16;a:11:{s:6:"column";s:2:"14";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"info-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area9";}}i:17;s:5:"clear";i:18;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"payment-method";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area10";}}i:19;s:5:"clear";i:20;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"follow-us";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area11";}}i:21;s:5:"clear";i:22;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:10:"footer-end";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area12";}}i:23;s:5:"clear";i:24;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:8:"ajax-fix";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:15:"before_body_end";}}i:25;s:5:"clear";}}}
EOB
),
	'is_active' => 1
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'	=>	'default/em0059',
	'layout'	=>	'2columns-left',	
	'content_decode'	=> unserialize(<<<EOB
a:3:{i:0;a:6:{s:10:"custom_css";s:10:"store_view";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:5:"area1";}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper-header">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:10:"header-fix";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"header";}}i:1;s:5:"clear";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper-content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:26:{i:0;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"main-slideshow";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area2";}}i:1;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:20:"top-banner-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area3";}}i:2;s:5:"clear";i:3;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:11:"breadcrumbs";}}i:4;s:5:"clear";i:5;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:47:"<div class="col-left sidebar">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:4:"left";}}i:6;a:11:{s:6:"column";s:2:"18";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:39:"<div class="col-main">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:2:{i:0;s:15:"global_messages";i:1;s:7:"content";}}i:7;s:5:"clear";i:8;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:21:"home-banner-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area4";}}i:9;s:5:"clear";i:10;a:11:{s:6:"column";s:2:"14";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:13:"tab-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area5";}}i:11;a:11:{s:6:"column";s:2:"10";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:16:"editor-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area6";}}i:12;s:5:"clear";i:13;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area7";}}i:14;s:5:"clear";i:15;a:11:{s:6:"column";s:2:"10";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"blog-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area8";}}i:16;a:11:{s:6:"column";s:2:"14";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"info-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area9";}}i:17;s:5:"clear";i:18;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"payment-method";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area10";}}i:19;s:5:"clear";i:20;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"follow-us";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area11";}}i:21;s:5:"clear";i:22;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:10:"footer-end";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area12";}}i:23;s:5:"clear";i:24;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:8:"ajax-fix";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:15:"before_body_end";}}i:25;s:5:"clear";}}}
EOB
),
	'is_active' => 1
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'	=>	'default/em0059',
	'layout'	=>	'3columns',	
	'content_decode'	=> unserialize(<<<EOB
a:3:{i:0;a:6:{s:10:"custom_css";s:10:"store_view";s:10:"inner_html";s:0:"";s:10:"outer_html";s:0:"";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:5:"area1";}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper-header">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:10:"header-fix";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"header";}}i:1;s:5:"clear";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper-content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:27:{i:0;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"main-slideshow";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area2";}}i:1;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:20:"top-banner-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area3";}}i:2;s:5:"clear";i:3;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:11:"breadcrumbs";}}i:4;s:5:"clear";i:5;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:18:"left-fix-cloudzoom";s:10:"inner_html";s:47:"<div class="col-left sidebar">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:4:"left";}}i:6;a:11:{s:6:"column";s:2:"12";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:18:"main-fix-cloudzoom";s:10:"inner_html";s:39:"<div class="col-main">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:2:{i:0;s:15:"global_messages";i:1;s:7:"content";}}i:7;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:19:"right-fix-cloudzoom";s:10:"inner_html";s:48:"<div class="col-right sidebar">{{content}}</div>";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"right";}}i:8;s:5:"clear";i:9;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:21:"home-banner-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area4";}}i:10;s:5:"clear";i:11;a:11:{s:6:"column";s:2:"14";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:13:"tab-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area5";}}i:12;a:11:{s:6:"column";s:2:"10";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:16:"editor-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area6";}}i:13;s:5:"clear";i:14;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area7";}}i:15;s:5:"clear";i:16;a:11:{s:6:"column";s:2:"10";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"blog-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area8";}}i:17;a:11:{s:6:"column";s:2:"14";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"info-container";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:5:"area9";}}i:18;s:5:"clear";i:19;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"payment-method";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area10";}}i:20;s:5:"clear";i:21;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"follow-us";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area11";}}i:22;s:5:"clear";i:23;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:10:"footer-end";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"area12";}}i:24;s:5:"clear";i:25;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:8:"ajax-fix";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:15:"before_body_end";}}i:26;s:5:"clear";}}}
EOB
),
	'is_active' => 1
);
$model->setData($data)->setStores(array(0))->save();
$installer->endSetup();
