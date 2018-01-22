<?php
class EM_Topratingproducts_Block_Topratingproducts extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getTopratingproducts()     
     { 
        if (!$this->hasData('topratingproducts')) {
            $this->setData('topratingproducts', Mage::registry('topratingproducts'));
        }
        return $this->getData('topratingproducts');
        
    }
}