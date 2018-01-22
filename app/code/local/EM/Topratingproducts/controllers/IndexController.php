<?php
class EM_Topratingproducts_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/topratingproducts?id=15 
    	 *  or
    	 * http://site.com/topratingproducts/id/15 	
    	 */
    	/* 
		$topratingproducts_id = $this->getRequest()->getParam('id');

  		if($topratingproducts_id != null && $topratingproducts_id != '')	{
			$topratingproducts = Mage::getModel('topratingproducts/topratingproducts')->load($topratingproducts_id)->getData();
		} else {
			$topratingproducts = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($topratingproducts == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$topratingproductsTable = $resource->getTableName('topratingproducts');
			
			$select = $read->select()
			   ->from($topratingproductsTable,array('topratingproducts_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$topratingproducts = $read->fetchRow($select);
		}
		Mage::register('topratingproducts', $topratingproducts);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}