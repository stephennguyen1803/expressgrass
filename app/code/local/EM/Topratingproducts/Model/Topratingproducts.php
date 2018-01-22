<?php

class EM_Topratingproducts_Model_Topratingproducts extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('topratingproducts/topratingproducts');
    }
}