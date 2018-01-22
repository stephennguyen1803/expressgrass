<?php
class EM_Bestsellerproducts_Block_List extends Mage_Catalog_Block_Product_Abstract
implements Mage_Widget_Block_Interface
{
	 protected function _construct()
    {
		if($this->getCacheLifeTime())
		{
			$this->addData(array(
				'cache_lifetime'    => $this->getCacheLifeTime(),
				'cache_tags'        => array(Mage_Catalog_Model_Product::CACHE_TAG)
			));
		}
		else	
		{
			$this->addData(array(
				'cache_lifetime'    => 7200,
				'cache_tags'        => array(Mage_Catalog_Model_Product::CACHE_TAG)
			));
		}
		parent::_construct();
		
    }   
	
	public function _prepareLayout()
	{
	
		return parent::_prepareLayout();
	}

	protected function _toHtml()
	{	
		if($this->getData('choose_template')	==	'custom_template')
		{
			if($this->getData('custom_theme'))
				$this->setTemplate($this->getData('custom_theme'));	
			else 
				$this->setTemplate('em_bestseller_products/bestseller_custom.phtml');	
		}
		else
		{
			$this->setTemplate($this->getData('choose_template'));	
		}
		return parent::_toHtml();
	}
	
	public function getCategories()
	{
		$strCategories=  $this->getData(new_category);
		$arrCategories = explode(",", $strCategories);
		return $arrCategories;
	}
	
	public function getColumnCount(){
		return $this->getData('column_count');
	}
	
	public function getLimitCount(){
		return $this->getData('limit_count');
	}
	
	public function getFeatureChoosed(){
		return $this->getData('featured_choose');
	}
	
	public function getOrderBy(){
		return $this->getData('order_by');
	}
	
	public function getCacheLifeTime(){		
		return $this->getData('cache_lifetime');
	}
	
	protected function getProductCollection()
	{		
		$strCategories = $this->getData('new_category');
		if($strCategories)
		{
			$query = "
						SELECT DISTINCT SUM( order_items.qty_ordered ) AS  `ordered_qty` ,  `order_items`.`name` AS  `order_items_name` ,  `order_items`.`product_id` AS  `entity_id` ,  `e`.`entity_type_id` ,  `e`.`attribute_set_id` , `e`.`type_id` ,  `e`.`sku` ,  `e`.`has_options` ,  `e`.`required_options` ,  `e`.`created_at` ,  `e`.`updated_at` 
						FROM  `sales_flat_order_item` AS  `order_items` 
						INNER JOIN  `sales_flat_order` AS  `order` ON  `order`.entity_id = order_items.order_id
						AND  `order`.state <>  'canceled'
						LEFT JOIN  `catalog_product_entity` AS  `e` ON e.entity_id = order_items.product_id
						INNER JOIN  `catalog_product_website` AS  `product_website` ON product_website.product_id = e.entity_id
						AND product_website.website_id =  '1'
						INNER JOIN  `catalog_category_product_index` AS  `cat_index` ON cat_index.product_id = e.entity_id
						AND cat_index.store_id =1
						AND cat_index.category_id
						IN ( ".$strCategories." ) 
						WHERE (
						parent_item_id IS NULL
						)
						GROUP BY  `order_items`.`product_id` 
						HAVING (
						SUM( order_items.qty_ordered ) >0
						)
						ORDER BY  `ordered_qty` DESC 
						LIMIT 0 ,".$this->getLimitCount()."
					";
		 
		}else
		{
			$query = "	SELECT SUM( order_items.qty_ordered ) AS  `ordered_qty` ,  `order_items`.`name` AS  `order_items_name` ,  `order_items`.`product_id` AS  `entity_id` ,  `e`.`entity_type_id` ,  `e`.`attribute_set_id` , `e`.`type_id` ,  `e`.`sku` ,  `e`.`has_options` ,  `e`.`required_options` ,  `e`.`created_at` ,  `e`.`updated_at` 
						FROM  `sales_flat_order_item` AS  `order_items` 
						INNER JOIN  `sales_flat_order` AS  `order` ON  `order`.entity_id = order_items.order_id
						AND  `order`.state <>  'canceled'
						LEFT JOIN  `catalog_product_entity` AS  `e` ON e.entity_id = order_items.product_id
						INNER JOIN  `catalog_product_website` AS  `product_website` ON product_website.product_id = e.entity_id
						AND product_website.website_id =  '1'
						WHERE (
						parent_item_id IS NULL
						)
						GROUP BY  `order_items`.`product_id` 
						HAVING (
						SUM( order_items.qty_ordered ) >0
						)
						ORDER BY  `ordered_qty` DESC 
						LIMIT 0 ,".$this->getLimitCount()."
						";
		}

		
		$resource = Mage::getSingleton('core/resource');
		$readConnection = $resource->getConnection('core_read');
		//$readConnection->setFetchMode(Zend_Db::FETCH_OBJ);
		return $readConnection->fetchAll($query);
		
		 
		/*
		$storeId    = Mage::app()->getStore()->getId();
		$current_category=$this->getCurrentCategory();
		$products = Mage::getResourceModel('reports/product_collection')
			->addOrderedQty()
			->addAttributeToSelect('*')           
			->setStoreId($storeId)
			->addStoreFilter($storeId)
			->setOrder('ordered_qty', 'desc'); //best sellers on top        		
			$products->setPageSize(20);
			$config1 = $this->getData(new_category);
		if($config1)
		{
			$result = array();
			$condition_cat = array();
			$alias = 'cat_index';
			$categoryCondition = $products->getConnection()->quoteInto(
			$alias.'.product_id=e.entity_id AND '.$alias.'.store_id=? AND ',
			$products->getStoreId()
			);
			$categoryCondition.= $alias.'.category_id IN ('.$config1.')';
			$products->getSelect()->joinInner(
			array($alias => $products->getTable('catalog/category_product_index')),
			$categoryCondition,
			array()
			);
			$products->_categoryIndexJoined = true;
			$products->distinct(true);
		}
		echo (string) $products->getSelect();die;*/		
		//return $products;
	}
}
?>