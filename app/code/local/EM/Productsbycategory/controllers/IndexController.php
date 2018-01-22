<?php
class EM_Productsbycategory_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/productsbycategory?id=15 
    	 *  or
    	 * http://site.com/productsbycategory/id/15 	
    	 */
    	/* 
		$productsbycategory_id = $this->getRequest()->getParam('id');

  		if($productsbycategory_id != null && $productsbycategory_id != '')	{
			$productsbycategory = Mage::getModel('productsbycategory/productsbycategory')->load($productsbycategory_id)->getData();
		} else {
			$productsbycategory = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($productsbycategory == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$productsbycategoryTable = $resource->getTableName('productsbycategory');
			
			$select = $read->select()
			   ->from($productsbycategoryTable,array('productsbycategory_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$productsbycategory = $read->fetchRow($select);
		}
		Mage::register('productsbycategory', $productsbycategory);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}