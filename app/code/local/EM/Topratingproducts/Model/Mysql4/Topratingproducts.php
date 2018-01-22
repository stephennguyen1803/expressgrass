<?php

class EM_Topratingproducts_Model_Mysql4_Topratingproducts extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the topratingproducts_id refers to the key field in your database table.
        $this->_init('topratingproducts/topratingproducts', 'topratingproducts_id');
    }
}