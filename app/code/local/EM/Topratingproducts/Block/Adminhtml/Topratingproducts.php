<?php
class EM_Topratingproducts_Block_Adminhtml_Topratingproducts extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_topratingproducts';
    $this->_blockGroup = 'topratingproducts';
    $this->_headerText = Mage::helper('topratingproducts')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('topratingproducts')->__('Add Item');
    parent::__construct();
  }
}