<?php

class EM_Productsbycategory_Model_Mysql4_Productsbycategory_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('productsbycategory/productsbycategory');
    }
}