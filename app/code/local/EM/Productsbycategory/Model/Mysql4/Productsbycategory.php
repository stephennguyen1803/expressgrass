<?php

class EM_Productsbycategory_Model_Mysql4_Productsbycategory extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the productsbycategory_id refers to the key field in your database table.
        $this->_init('productsbycategory/productsbycategory', 'productsbycategory_id');
    }
}