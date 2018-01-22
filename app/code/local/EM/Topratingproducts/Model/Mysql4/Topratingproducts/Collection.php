<?php

class EM_Topratingproducts_Model_Mysql4_Topratingproducts_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('topratingproducts/topratingproducts');
    }
}