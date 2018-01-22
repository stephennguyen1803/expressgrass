<?php
class EM_Slideshowwidget_Block_Content extends Mage_Uploader_Block_Single
{
//protected $_config;

    public function __construct()
    {
        parent::__construct();
    	$this->setUseAjax(true);
    }
 public function getContentsUrl()
    {
        return $this->getUrl('*/admin_chooser/contents', array('type' => $this->getRequest()->getParam('type')));
    }
 
}
?>