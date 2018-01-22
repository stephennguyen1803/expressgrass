<?php
class EM_Productsbycategory_Block_Productsbycategory extends Mage_Core_Block_Template 
implements Mage_Widget_Block_Interface
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    public function getCategory()
	{
		$category=  $this->getData('category');
		return $category;
	}
	
	public function getLabel(){
		return $this->getData('label');
	}
	
	public function getLimitCount(){
		return $this->getData('number_product');
	}
    public function getProductsbycategory()     
    { 
        if (!$this->hasData('productsbycategory')) {
            $this->setData('productsbycategory', Mage::registry('productsbycategory'));
        }
        return $this->getData('productsbycategory');
        
    }
	protected function _toHtml()
	{	
		$this->assign('category_id', $this->getCategory());
		$this->assign('label', $this->getLabel());
		$this->assign('limit', $this->getLimitCount());
		$this->setTemplate('productsbycategory/productsbycategory.phtml');	
		return parent::_toHtml();
	}
}