<?php
class EM_Topratingproducts_Block_List extends Mage_Review_Block_View
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
			$this->setTemplate('em_topratingproducts/custom.phtml');
		}
		else
		{
			$this->setTemplate($this->getData('choose_template'));
		}
		return parent::_toHtml();
	}

	public function getProductCollection(){
		$_items_reviews = $this->getTopRatingProductCollection();
		$_temp_productIds = array();
		$count=0; 
		$limit = $this->getData('limit_count');
		foreach ($_items_reviews as $_review){
			
			if(in_array($_review['entity_pk_value'],$_temp_productIds))
			{
				continue;
			}
			else
			{
				$_temp_productIds[] = $_review['entity_pk_value'];
				$count++;
				if($count == $limit)
				{
					break;
				}
			}
		}
		$products= Mage::getModel('catalog/product')->getCollection()
			->addAttributeToFilter('status', array('neq' => Mage_Catalog_Model_Product_Status::STATUS_DISABLED))
		    ->addAttributeToFilter('visibility',array("neq"=>1))
			->addAttributeToFilter('entity_id',array('in' => $_temp_productIds))
			->addAttributeToSelect('*'); 
		return $products;	
	}
	
	public function getTopRatingProductCollection() // getReviewsCollection()
	{
		//Lay ra danh sach Category:
		$products= Mage::getModel('catalog/product')->getCollection()
		->addAttributeToFilter('status', array('neq' => Mage_Catalog_Model_Product_Status::STATUS_DISABLED))
		->addAttributeToFilter('visibility',array("neq"=>1));

		//Filter by categories
		$config1 = $this->getData('new_category');
		if($config1)
		{
			$result = array();
			$condition_cat = array();
			$alias = 'cat_index';
			$categoryCondition = $products->getConnection()->quoteInto(
			$alias.'.product_id=e.entity_id AND '.$alias.'.store_id=? AND ',
			Mage::app()->getStore()->getId()
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
		$arr_product_ids = null;
		foreach ($products as $_product) 
		{
			$arr_product_ids  []= $_product->getId();
		}

		$str_product_ids = implode($arr_product_ids,',');
		
		if($this->getData('minimum_reviews_count'))
			$minimum_reviews_count = $this->getData('minimum_reviews_count');
		else 
			$minimum_reviews_count = 1;
			
		$result = Mage::getModel('review/review_summary')->getCollection()
		->addStoreFilter(Mage::app()->getStore()->getId())
		//->addStatusFilter(Mage_Review_Model_Review::STATUS_APPROVED)
		->addFieldToFilter('entity_pk_value', array('in' => $arr_product_ids ))
		->addFieldToFilter('reviews_count', array('gt' => $minimum_reviews_count ))
		->setOrder('rating_summary', 'desc');
		//echo $result->getSelect();die;
		return $result;
	}
	
	public function getTopRatingProductCollection_Show() // getReviewsCollection()
	{
		//Lay ra danh sach Category:
		$products= Mage::getModel('catalog/product')->getCollection()
		->addAttributeToFilter('status', array('neq' => Mage_Catalog_Model_Product_Status::STATUS_DISABLED))
		->addAttributeToFilter('visibility',array("neq"=>1));

		//Sort
		$config2 = $this->getData('order_by');
		if(isset($config2))
		{
			$orders = explode(' ',$config2);
		}

		//Filter by categories
		$config1 = $this->getData('new_category');
		if($config1)
		{
			$result = array();
			$condition_cat = array();
			$alias = 'cat_index';
			$categoryCondition = $products->getConnection()->quoteInto(
			$alias.'.product_id=e.entity_id AND '.$alias.'.store_id=? AND ',
			Mage::app()->getStore()->getId()
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
		$arr_product_ids = null;
		foreach ($products as $_product) 
		{
			$arr_product_ids  []= $_product->getId();
		}

		$str_product_ids = implode($arr_product_ids,',');
		$limit = $this->getData('limit_count');
		$start_page =1;
		if($this->getData('minimum_reviews_count'))
			$minimum_reviews_count = $this->getData('minimum_reviews_count');
		else 
			$minimum_reviews_count = 1;
		$result = Mage::getModel('review/review_summary')->getCollection()
		->addStoreFilter(Mage::app()->getStore()->getId())
		//->addStatusFilter(Mage_Review_Model_Review::STATUS_APPROVED)
		->addFieldToFilter('entity_pk_value', array('in' => $arr_product_ids ))
		->setOrder('rating_summary', 'desc')
		->addFieldToFilter('reviews_count', array('gteq' => $minimum_reviews_count ))
		->setPageSize($limit)
		->setCurPage($start_page);
		//echo $result->getSelect();die;
		return $result;
	}
	


	//1. Load data by using query.

	public function getReviewsCollection_By_Querry() // getReviewsCollection()
	{
		//rs.rating_summary
		$listLimit  = intval($this->getData('limit_count'));
		$sortBy		= 'r.rating_summary';
		$reviewTable 	= Mage::getSingleton('core/resource')->getTableName('review');
		$rdetailTable	= Mage::getSingleton('core/resource')->getTableName('review_detail');
		$rsummTable		= Mage::getSingleton('core/resource')->getTableName('review_entity_summary');
		$storeId 		= Mage::app()->getStore()->getStoreId();
		$dir 		= "DESC";
		$write 		= Mage::getSingleton('core/resource')->getConnection('core_write');
		$result 	= $write->query("select r.review_id, r.rating_summary, r.entity_pk_value, rd.title, rd.detail, rd.nickname, rs.rating_summary from ".$reviewTable." r, ".$rdetailTable." rd, ".$rsummTable." rs
						where r.entity_pk_value = rs.entity_pk_value and r.review_id = rd.review_id and r.status_id=".Mage_Review_Model_Review::STATUS_APPROVED." and rs.store_id=$storeId
						order by $sortBy $dir
						limit $listLimit");

		return $result;

	}

	//2. Load data by using query. Filter by categories

	public function getReviewsCollection_By_Querry_Filter_By_Categories() // getReviewsCollection()
	{
		//rs.rating_summary
		$listLimit  = intval($this->getData('limit_count'));
		$sortBy		= 'main_table.rating_summary';
		$reviewTable 	= Mage::getSingleton('core/resource')->getTableName('review');
		$rdetailTable	= Mage::getSingleton('core/resource')->getTableName('review_detail');
		$rsummTable		= Mage::getSingleton('core/resource')->getTableName('review_entity_summary');
		$rstoreTable 	= Mage::getSingleton('core/resource')->getTableName('review_store');
		
		$storeId 		= Mage::app()->getStore()->getStoreId();
		$dir 		= "DESC";
		$write 		= Mage::getSingleton('core/resource')->getConnection('core_write');
		$result 	= $write->query("
		
			SELECT  `main_table` . * ,  `detail`.`detail_id` ,  `detail`.`title` ,  `detail`.`detail` ,  `detail`.`nickname` ,  `detail`.`customer_id`
			FROM ".$reviewTable ." AS  `main_table`
			INNER JOIN  ".$rdetailTable." AS  `detail` ON main_table.review_id = detail.review_id
			INNER JOIN  ".$rstoreTable." AS  `store` ON main_table.review_id = store.review_id
			WHERE (
			store.store_id
			IN (".
			$storeId
			.")
			)
			AND (
			main_table.entity_pk_value
			IN (
			'16,17,18,19,20,166'
			)
			and (main_table.status_id=".Mage_Review_Model_Review::STATUS_APPROVED.") and (store.store_id=$storeId)
			)
			order by $sortBy $dir
			LIMIT 0 , ".$listLimit."				
		");
			
		return $result;

	}

	//3. Load data by using collection.
	public function getReviewsCollection_By_Collection() // getReviewsCollection()
	{
	$result = Mage::getModel('review/review')->getCollection()
		->addStoreFilter(Mage::app()->getStore()->getId())
		->addStatusFilter(Mage_Review_Model_Review::STATUS_APPROVED)
		//continue here           // ->addEntityFilter('entity_code', array('like' => 'product'))
		//->addFieldToFilter('main_table.entity_pk_value', array('in' => $str_product_ids )) //loc review trong category
		//->setDateOrder()
		//->addRateVotes()
		->setOrder('rating_summary', 'desc')
		->setPageSize($limit)
		->setCurPage($start_page)
		;
		return $result;
		
	}
	
	
	public function getReviewsCollection_By_Collection_Filter_By_Categories() 
	{
		$products= Mage::getModel('catalog/product')->getCollection()
		->addAttributeToFilter('status', array('neq' => Mage_Catalog_Model_Product_Status::STATUS_DISABLED))
		->addAttributeToFilter('visibility',array("neq"=>Mage_Catalog_Model_Product_Visibility::VISIBILITY_NOT_VISIBLE));

		//Filter by categories
		$config1 = $this->getData('new_category');
		if($config1)
		{
			$result = array();
			$condition_cat = array();
			$alias = 'cat_index';
			$categoryCondition = $products->getConnection()->quoteInto(
			$alias.'.product_id=e.entity_id AND '.$alias.'.store_id=? AND ',
			Mage::app()->getStore()->getId()
			);
			$categoryCondition.= $alias.'.category_id IN ('.$config1.')';
			$products->getSelect()->joinInner(
			array($alias => $products->getTable('catalog/category_product_index')),
			$categoryCondition,
			array()
			);
			$products->_categoryIndexJoined = true;
			//$products->addAttributeToSelect('*');
			$products->distinct(true);
		}
		$arr_product_ids = null;
		foreach ($products as $_product) //loop for getting products
		{
			$arr_product_ids  []= $_product->getId();
		}


		$str_product_ids = implode($arr_product_ids,',');
		$limit = $this->getData('limit_count');
		//$limit =1;
		$start_page =1;

		//Cach moi
		$result = Mage::getModel('review/review')->getCollection()
		->addStoreFilter(Mage::app()->getStore()->getId())
		->addStatusFilter(Mage_Review_Model_Review::STATUS_APPROVED)
		->addFieldToFilter('main_table.entity_pk_value', array('in' => $str_product_ids )) //loc review trong category
		->setOrder('rating_summary', 'desc')
		->setPageSize($limit)
		->setCurPage($start_page)
		;
		return $result;
	}
}