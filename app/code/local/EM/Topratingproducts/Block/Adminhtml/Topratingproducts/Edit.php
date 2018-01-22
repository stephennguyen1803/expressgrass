<?php

class EM_Topratingproducts_Block_Adminhtml_Topratingproducts_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'topratingproducts';
        $this->_controller = 'adminhtml_topratingproducts';
        
        $this->_updateButton('save', 'label', Mage::helper('topratingproducts')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('topratingproducts')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('topratingproducts_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'topratingproducts_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'topratingproducts_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('topratingproducts_data') && Mage::registry('topratingproducts_data')->getId() ) {
            return Mage::helper('topratingproducts')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('topratingproducts_data')->getTitle()));
        } else {
            return Mage::helper('topratingproducts')->__('Add Item');
        }
    }
}