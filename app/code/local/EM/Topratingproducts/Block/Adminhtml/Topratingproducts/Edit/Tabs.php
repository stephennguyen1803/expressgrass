<?php

class EM_Topratingproducts_Block_Adminhtml_Topratingproducts_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('topratingproducts_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('topratingproducts')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('topratingproducts')->__('Item Information'),
          'title'     => Mage::helper('topratingproducts')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('topratingproducts/adminhtml_topratingproducts_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}