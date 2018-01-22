<?php
class EM_Em0059settings_Em0059settings
{
	public function get_grid_thumb_width()
	{
		return Mage::getStoreConfig('em0059/image_category/grid_thumb_width');
	}
	public function get_grid_thumb_height()
	{
		return Mage::getStoreConfig('em0059/image_category/grid_thumb_height');
	}
	
	public function get_listing_thumb_width()
	{
		return Mage::getStoreConfig('em0059/image_category/listing_thumb_width');
	}
	public function get_listing_thumb_height()
	{
		return Mage::getStoreConfig('em0059/image_category/listing_thumb_height');
	}
	
	public function get_base_image_width()
	{
		return Mage::getStoreConfig('em0059/image_product/base_image_width');
	}
	public function get_base_image_height()
	{
		return Mage::getStoreConfig('em0059/image_product/base_image_height');
	}
	
	public function get_thumb_base_width()
	{
		return Mage::getStoreConfig('em0059/image_product/thumb_base_width');
	}
	public function get_thumb_base_height()
	{
		return Mage::getStoreConfig('em0059/image_product/thumb_base_height');
	}
	
	public function get_related_width()
	{
		return Mage::getStoreConfig('em0059/image_related/related_width');
	}
	public function get_related_height()
	{
		return Mage::getStoreConfig('em0059/image_related/related_height');
	}
	
	public function get_crosssell_width()
	{
		return Mage::getStoreConfig('em0059/image_crossell/crosssell_width');
	}
	public function get_crosssell_height()
	{
		return Mage::getStoreConfig('em0059/image_crossell/crosssell_height');
	}
	
	public function get_upsell_width()
	{
		return Mage::getStoreConfig('em0059/image_upsell/upsell_width');
	}
	public function get_upsell_height()
	{
		return Mage::getStoreConfig('em0059/image_upsell/upsell_height');
	}
	
	public function get_featured_width()
	{
		return Mage::getStoreConfig('em0059/image_featured/featured_width');
	}
	public function get_featured_height()
	{
		return Mage::getStoreConfig('em0059/image_featured/featured_height');
	}
    
    public function get_tabs_width()
	{
		return Mage::getStoreConfig('em0059/image_tabs/tabs_width');
	}
	public function get_tabs_height()
	{
		return Mage::getStoreConfig('em0059/image_tabs/tabs_height');
	}
    
    public function get_editor_pick_width()
	{
		return Mage::getStoreConfig('em0059/image_editor_pick/editor_pick_width');
	}
	public function get_editor_pick_height()
	{
		return Mage::getStoreConfig('em0059/image_editor_pick/editor_pick_height');
	}
    
    public function get_lastest_review_width()
	{
		return Mage::getStoreConfig('em0059/image_lastest_review/lastest_review_width');
	}
	public function get_lastest_review_height()
	{
		return Mage::getStoreConfig('em0059/image_lastest_review/lastest_review_height');
	}
    
    public function get_shopping_cart_width()
	{
		return Mage::getStoreConfig('em0059/image_shopping_cart/shopping_cart_width');
	}
	public function get_shopping_cart_height()
	{
		return Mage::getStoreConfig('em0059/image_shopping_cart/shopping_cart_height');
	}
    
    public function get_grid_thumb_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/grid_thumb_bgcolor');
	}
    
    public function get_listing_thumb_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/listing_thumb_bgcolor');
	}
    
    public function get_base_image_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/base_image_bgcolor');
	}
    
    public function get_thumb_base_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/thumb_base_bgcolor');
	}
    
    public function get_related_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/related_bgcolor');
	}
    
    public function get_crosssell_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/crosssell_bgcolor');
	}
    
    public function get_upsell_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/upsell_bgcolor');
	}
    
    public function get_featured_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/featured_bgcolor');
	}
    
    public function get_tabs_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/tabs_bgcolor');
	}
    
    public function get_editor_pick_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/editor_pick_bgcolor');
	}
    
    public function get_lastest_review_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/lastest_review_bgcolor');
	}
    
    public function get_shopping_cart_bgcolor()
	{
		return Mage::getStoreConfig('em0059/image_background/shopping_cart_bgcolor');
	}
	
	public function get_column_count(){
		$nameTheme = 'em0059';
		$curTemplate = $this->getCurrentTemplate();
		$availableColumnCount = array(
			'empty'				=>	5,
			'1column'		=>	Mage::getStoreConfig($nameTheme.'/column_count/cat_one_column'),
			'2columns-left'	=>	Mage::getStoreConfig($nameTheme.'/column_count/cat_two_columns'),
			'2columns-right'	=>	Mage::getStoreConfig($nameTheme.'/column_count/cat_two_columns'),
			'3columns'		=>	Mage::getStoreConfig($nameTheme.'/column_count/cat_three_columns')
		);	
		return $availableColumnCount[$curTemplate];
	}
	
	public function getCurrentTemplate(){
		return str_replace(array('page/','.phtml'),'',Mage::app()->getLayout()->getBlock('root')->getTemplate());
	}

	public function get_mobile_store()
	{
		return Mage::getStoreConfig('em0059/store/mobile_store');
	}
	public function get_mobile_group()
	{
		return Mage::getStoreConfig('em0059/store/mobile_group');
	}
	
}