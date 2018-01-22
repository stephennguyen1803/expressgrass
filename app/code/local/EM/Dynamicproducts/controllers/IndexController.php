<?php
class EM_Dynamicproducts_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/dynamicproducts?id=15 
    	 *  or
    	 * http://site.com/dynamicproducts/id/15 	
    	 */
    	/* 
		$dynamicproducts_id = $this->getRequest()->getParam('id');

  		if($dynamicproducts_id != null && $dynamicproducts_id != '')	{
			$dynamicproducts = Mage::getModel('dynamicproducts/dynamicproducts')->load($dynamicproducts_id)->getData();
		} else {
			$dynamicproducts = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($dynamicproducts == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$dynamicproductsTable = $resource->getTableName('dynamicproducts');
			
			$select = $read->select()
			   ->from($dynamicproductsTable,array('dynamicproducts_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$dynamicproducts = $read->fetchRow($select);
		}
		Mage::register('dynamicproducts', $dynamicproducts);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}