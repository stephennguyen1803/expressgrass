<?php

$installer = $this;

$installer->startSetup();

$attribute = Mage::getModel('catalog/resource_eav_attribute');
$block = Mage::getModel('cms/block');
$page = Mage::getModel('cms/page');
$widgetInstance = Mage::getModel('widget/widget_instance');

$stores = array(0);

// Config perfix for identifier of static block and static page
$prefixBlock = 'em0059_';
$prefixPage = 'em0059_';

####################################################################################################
# INSERT Product Attribute
####################################################################################################

$att['attribute_code']	=	'em_featured';
$att['is_global']	=	0;
$att['frontend_input']	=	boolean;
$att['default_value_yesno']	=	0;
$att['is_unique']	=	0;
$att['is_required']	=	0;
$att['is_configurable']	=	0;
$att['is_searchable']	=	0;
$att['is_visible_in_advanced_search']	=	0;
$att['is_comparable']	=	0;
$att['is_used_for_promo_rules']	=	1;
$att['is_html_allowed_on_front']	=	1;
$att['is_visible_on_front']	=	0;
$att['used_in_product_listing']	=	1;
$att['used_for_sort_by']	=	0;
$att['frontend_label'][0]	=	'EM Featured Product';
$att['source_model']	=	'eav/entity_attribute_source_boolean';
$att['is_filterable']	=	0;
$att['is_filterable_in_search']	=	0;
$att['backend_type']	=	int;
$att['default_value']	=	0;
$att['entity_type_id']	=	Mage::getModel('eav/entity')->setType(Mage_Catalog_Model_Product::ENTITY)->getTypeId();
$att['is_user_defined']	=	1;
$featured	=	$attribute->setData($att)->save()->getId();
$installer->addAttributeToGroup('catalog_product','default','General',$featured);

$att['attribute_code']	=	'em_editor';
$att['is_global']	=	0;
$att['frontend_input']	=	boolean;
$att['default_value_yesno']	=	0;
$att['is_unique']	=	0;
$att['is_required']	=	0;
$att['is_configurable']	=	0;
$att['is_searchable']	=	0;
$att['is_visible_in_advanced_search']	=	0;
$att['is_comparable']	=	0;
$att['is_used_for_promo_rules']	=	1;
$att['is_html_allowed_on_front']	=	1;
$att['is_visible_on_front']	=	0;
$att['used_in_product_listing']	=	1;
$att['used_for_sort_by']	=	0;
$att['frontend_label'][0]	=	"EM Editor's Pick Product";
$att['source_model']	=	'eav/entity_attribute_source_boolean';
$att['is_filterable']	=	0;
$att['is_filterable_in_search']	=	0;
$att['backend_type']	=	int;
$att['default_value']	=	0;
$att['entity_type_id']	=	Mage::getModel('eav/entity')->setType(Mage_Catalog_Model_Product::ENTITY)->getTypeId();
$att['is_user_defined']	=	1;
$featured	=	$attribute->setData($att)->save()->getId();
$installer->addAttributeToGroup('catalog_product','default','General',$featured);


####################################################################################################
# INSERT STATIC BLOCKS
####################################################################################################

/*$dataBlock = array(
	'title' => 'aaaa',
	'identifier' => $prefixBlock.'aaaa',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
aaaa
EOB
);
$aaaa	=	$block->setData($dataBlock)->save()->getId(); */

// 1. EM0059 Shipping Call - em0059_shipping_call
$dataBlock = array(
	'title' => 'EM0059 Shipping Call',
	'identifier' => $prefixBlock.'shipping_call',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="shipping_call">
<div class="free_shipping"><a href="#"><img src="{{skin url='images/media/free_shipping.jpg'}}" alt="" /></a></div>
<div class="call_number"><a href="#"><img src="{{skin url='images/media/call_number.jpg'}}" alt="" /></a></div>
</div>
EOB
);
$shipping_call	=	$block->setData($dataBlock)->save()->getId();

// 2. EM0059 Megamenu - em0059_megamenu
$dataBlock = array(
	'title' => 'EM0059 Megamenu',
	'identifier' => $prefixBlock.'megamenu',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<ul class="menu">
<li class="first"><a class="drop level-top" href="{{store direct_url=''}}"><span>Home</span></a></li>
<!-- End -->
<li><a class="drop level-top" href="{{store direct_url='apparel.html'}}"><span>Backpacks</span></a>
<div class="dropdown_6columns">
<div class="inner"><span class="title">Backpacks</span>
<p class="note first">This is an example of a large contaner with 6 columns</p>
<div class="col_6 firstcolumn">
<div class="content-6columns">
<div class="col_1 firstcolumn"><span class="title_col">LobortisLputate</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='apparel.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Malesuada </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Lobortis Vulpu</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='apparel.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Vulputate</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='apparel.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='apparel.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Phasellus lec</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='apparel/shirts.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='apparel/shirts.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='apparel.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
</ul>
</div>
<div class="col_1 last_column"><span class="title_col">Malesuada </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='apparel/shirts.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='apparel.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
</ul>
</div>
</div>
<div class="col_6">
<div class="col_2 firstcolumn">
<p class="note_title">Nunc Auctor Libero Ut Massa</p>
<div class="img"><a class="img" href="#"><img src="{{skin url='images/media/menu/img_menu_1.png'}}" alt="" /></a></div>
</div>
<div class="col_2">
<p class="first">Aliquam tristique faucibus metus malesuada liberom viverra at. Quisque ornare neque est.</p>
<p>Nam vehicula, dui in ultricies porttitorue non duieget aenean laoreet sapien id urna placerat sollicitudins erat volutpat.</p>
</div>
<div class="col_2">
<p class="note_title">Vivamus Id Eros Non Diam Hendrerit</p>
<p>Curabitur tempus tellus sit amet tristique comlectus nisi commodo libero, id cursus lacus nibh vitae nibh.</p>
<p>Nam vehicula, dui in ultricies porttitorue non duieget aenean laoreet sapien id urna placerat sollicitudins erat volutpat. Curabitur pretium, nisi vitae pretiumeo volutpat, ligula elit suscipit libero.</p>
</div>
</div>
</div>
</div>
</div>
</li>
<!-- End -->
<li><a class="drop level-top" href="{{store direct_url='furniture.html'}}"><span>Bags</span></a><!-- Begin 1 columns Item -->
<div class="dropdown_6columns">
<div class="inner"><span class="title">Bags</span>
<div class="col_6">
<div class="col_2">
<div class="col_2 firstcolumn"><a class="logo-menu" href="#"><img src="{{skin url='images/media/menu/logo_menu2.png'}}" alt="" /></a>
<p class="des_1">Quisque rhoncus mi non ligula iaculis eu consequat lectus eleifend. Vestibulum consectetur erat in lacus mollis luctus</p>
</div>
<div class="col_2 new-product"><span class="title_col">Last Added</span>
<div class="product">{{widget type="newproducts/list" order_by="name asc" new_category="3" limit_count="1" column_count="1" choose_template="custom_template" custom_theme="em_new_products/last_added.phtml"}}</div>
</div>
</div>
<div class="col_1"><span class="title_col">Pellentesque </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='apparel.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='electronics/computers.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='electronics/computers.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Phasellus leo</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='apparel.html'}}">Tristique Turpis</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Pellentesque</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='electronics/computers.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='electronics/computers.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='electronics/computers.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='electronics/computers.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='electronics/computers.html'}}">Amet Bibendum</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='apparel.html'}}">Tristique Turpis</a></li>
</ul>
</div>
<div class="col_2 last"><span class="title_col">Malesuada Tristique</span>
<div class="product">
<div class="emmediawidget ">{{widget type="mediauploadurlwidget/upload" media="http://www.youtube.com/watch?v=NTH6e-5OXtU" width="280" height="158" wmode="transparent"}}</div>
</div>
<p class="text_video">Lorem ipsum dolor sit amet, consectetur adipiscing Aliquam erat volutpat. Phasellus leo sapien</p>
</div>
</div>
</div>
</div>
</li>
<!-- End -->
<li><a class="drop level-top" href="{{store direct_url='apparel.html'}}"><span>Accessories</span></a>
<div class="dropdown_2columns">
<div class="inner"><span class="title">Travel Clothes</span>
<div class="col_2 firstcolumn wrapper_col">
<div class="col_1"><span class="title_col">Lorem Ipsum </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Vulputate</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
</div>
<div class="col_2 wrapper_col">
<div class="col_1"><span class="title_col">Lorem Ipsum </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Vulputate</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
</div>
</div>
</div>
</li>
<!-- End -->
<li><a class="drop level-top" href="{{store direct_url='apparel.html'}}"><span>Toiletries</span></a>
<div class="dropdown_1columns">
<div class="inner_many_levels">
<div class="col_1">{{widget type="megamenu/catalogmenu" none_li_first_class="1" none_li_last_class="1" ul_class="levels" category="18" template="em_megamenu/menu.phtml" set_layout_menu="other" max_row_per_column="10"}}</div>
</div>
</div>
</li>
<!-- End -->
<li><a class="drop level-top" href="{{config path='web/unsecure/base_url'}}apparel.html"><span>Travel Security</span></a>
<div class="dropdown_1columns">
<div class="inner"><span class="title">Travel Security</span>
<div class="col_1 wrapper_col_1 ">
<div class="col_1">
<ul class="first">
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
<ul class="center">
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
</ul>
<ul class="last">
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
</ul>
</div>
</div>
</div>
</div>
</li>
<!-- End -->
<li><a class="drop level-top" href="{{store direct_url='furniture.html'}}"><span>Travel Clothes</span> </a>
<div class="dropdown_2columns">
<div class="inner"><span class="title">Travel Clothes</span>
<div class="col_2 firstcolumn wrapper_col">
<div class="col_1"><span class="title_col">Lorem Ipsum </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Vulputate</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
</div>
<div class="col_2 wrapper_col">
<div class="col_1"><span class="title_col">Lorem Ipsum </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Vulputate</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
</div>
</div>
</div>
</li>
<!-- End -->
<li><a class="drop level-top" href="{{store direct_url='electronics/computers.html'}}"><span>Bags For Teens</span></a>
<div class="dropdown_6columns">
<div class="inner"><span class="title">Backpack For Teens</span>
<div class="col_6">
<div class="col_2 firstcolumn"><a class="img" href="#"><img src="{{skin url='images/media/menu/img_menu_2.png'}}" alt="" /></a>
<p>Aliquam tristique faucibus metus, nec malesuada bibe libero viverra at. Quisque ornare neque est. Nulla leon sapien, placerat ac fringilla sit amet, sagittisn tincidunt enim malesuada lectus.</p>
<p>Fusce dignissim, justo quis aliquam imperdiet, elit urna porttitor odio, vitae imperdiet justo purus id tellus.</p>
</div>
<div class="col_1"><span class="title_col">Sem Eleifend </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{config path='web/unsecure/base_url'}}apparel.html">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='apparel/shirts.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='apparel/shirts.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='apparel/shirts.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Phasellus leo</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='apparel.html'}}">Tristique Turpis</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Lobortis Nunc </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='apparel.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Phasellus leo</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='apparel.html'}}">Tristique Turpis</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Sem Eleifend </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='apparel.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='apparel/shirts.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='apparel/shirts.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='electronics/computers.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Phasellus leo</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='apparel.html'}}">Tristique Turpis</a></li>
</ul>
</div>
<div class="col_1 most_popular"><span class="title_col"> NEW ARRIVAL </span>
<div class="product">{{widget type="newproducts/list" order_by="name asc" new_category="3" limit_count="1" column_count="1" choose_template="custom_template" custom_theme="em_new_products/new_arrival_menu.phtml"}}</div>
</div>
</div>
</div>
</div>
</li>
<!-- End -->
<li class="last"><a class="drop level-top" href="{{store direct_url='electronics/computers.html'}}"><span>Bags For Boys</span></a>
<div class="dropdown_2columns">
<div class="inner"><span class="title">Travel Clothes</span>
<div class="col_2 firstcolumn wrapper_col">
<div class="col_1"><span class="title_col">Lorem Ipsum </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Vulputate</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
</div>
<div class="col_2 wrapper_col">
<div class="col_1"><span class="title_col">Lorem Ipsum </span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
<div class="col_1"><span class="title_col">Vulputate</span>
<ul>
<li class="level1 nav-3-1 first"><a href="{{store direct_url='furniture.html'}}">Phasellus Purus</a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Laoreet Sed</a></li>
<li class="level1 nav-3-3"><a href="{{store direct_url='furniture.html'}}">Nulla Quam </a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Morbi Odio</a></li>
<li class="level1 nav-3-5"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum </a></li>
<li class="level1 nav-3-2"><a href="{{store direct_url='furniture.html'}}">Tristique Turpis</a></li>
<li class="level1 nav-3-4"><a href="{{store direct_url='furniture.html'}}">Amet Bibendum</a></li>
</ul>
</div>
</div>
</div>
</div>
</li>
<!-- End --></ul>
EOB
);
$megamenu	=	$block->setData($dataBlock)->save()->getId();

// 3. EM0059 Top Banner - em0059_top_banner
$dataBlock = array(
	'title' => 'EM0059 Top Banner',
	'identifier' => $prefixBlock.'top_banner',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="top-banner"><a title="maecenas" href="#"><img src="{{skin url='images/media/top_banner.jpg'}}" alt="maecenas" /></a></div>
EOB
);
$top_banner	=	$block->setData($dataBlock)->save()->getId();

// 4. EM0059 Home Banner - em0059_home_banner
$dataBlock = array(
	'title' => 'EM0059 Home Banner',
	'identifier' => $prefixBlock.'home_banner',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="home-banner"><a title="pellen" href="#"><img src="{{skin url='images/media/banner1.jpg'}}" alt="" /></a> <a title="aenean" href="#"><img src="{{skin url='images/media/banner2.jpg'}}" alt="" /></a> <a title="sapien" href="#"><img src="{{skin url='images/media/banner3.jpg'}}" alt="" /></a> <a class="last" title="elit" href="#"><img src="{{skin url='images/media/banner4.jpg'}}" alt="" /></a></div>
EOB
);
$home_banner	=	$block->setData($dataBlock)->save()->getId();

// 5. EM0059 Footer Slideshow - em0059_footer_slideshow
$dataBlock = array(
	'title' => 'EM0059 Footer Slideshow',
	'identifier' => $prefixBlock.'footer_slideshow',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div id="slideshow-footer" class="content-slideshow-footer">
<div class="slideshow-box">
<ul class="jcarousel-skin-tango">
<li class="item"><a href="#"><img src="{{skin url="images/media/slideshow_footer/brand1.png"}}" alt="" /></a></li>
<li class="item"><a href="#"><img src="{{skin url="images/media/slideshow_footer/brand2.png"}}" alt="" /></a></li>
<li class="item"><a href="#"><img src="{{skin url="images/media/slideshow_footer/brand3.png"}}" alt="" /></a></li>
<li class="item"><a href="#"><img src="{{skin url="images/media/slideshow_footer/brand4.png"}}" alt="" /></a></li>
<li class="item"><a href="#"><img src="{{skin url="images/media/slideshow_footer/brand5.png"}}" alt="" /></a></li>
<li class="item"><a href="#"><img src="{{skin url="images/media/slideshow_footer/brand6.png"}}" alt="" /></a></li>
</ul>
</div>
</div>
<script type="text/javascript">// <![CDATA[
		jQuery(document).ready(function() {
			jQuery('#slideshow-footer > div > ul').jcarousel({
				wrap: 'circular',
				auto:1,
				buttonNextHTML:'<a class="next" href="javascript:void(0); title="Next"">Next</a>',
				buttonPrevHTML:'<a class="previous" href="javascript:void(0); title="Previous">Pre</a>',
				scroll:1,
				animation:'slow'
			});
		});
// ]]></script>
EOB
);
$footer_slideshow	=	$block->setData($dataBlock)->save()->getId();

// 6. EM0059 Footer Our Blog - em0059_footer_our_blog
$dataBlock = array(
	'title' => 'EM0059 Footer Our Blog',
	'identifier' => $prefixBlock.'footer_our_blog',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="footer-blog">{{block type="blog/post_recent" name="blog.recent.footer" template="em_blog/post/recent_footer.phtml"}}</div>
EOB
);
$footer_our_blog	=	$block->setData($dataBlock)->save()->getId();

// 7. EM0059 Footer Information - em0059_footer_information
$dataBlock = array(
	'title' => 'EM0059 Footer Information',
	'identifier' => $prefixBlock.'footer_information',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="footer-what">
<h4 class="footer-title">What We Do</h4>
<ul class="footer-link">
<li><a title="" href="#">What is Fashion</a></li>
<li><a title="" href="#">Categories of Fashion</a></li>
<li><a title="" href="#"> How Designs work</a></li>
<li><a title="" href="#">Designer's mind: Illusion</a></li>
<li><a title="" href="#">Fashion languages</a></li>
<li><a title="" href="#">traditional</a></li>
</ul>
</div>
<div class="footer-shopping">
<h4 class="footer-title">Shopping With Us</h4>
<ul class="footer-link">
<li><a title="" href="#">Deliveries</a></li>
<li><a title="" href="#">Returns and refunds</a></li>
<li><a title="" href="#">Ordering Help</a></li>
<li><a title="" href="{{store direct_url='privacy-policy-cookie-restriction-mode'}}">Security and Privacy</a></li>
<li><a title="" href="#">Term and Conditions</a></li>
<li><a title="" href="#">Frequently Asked Questions</a></li>
</ul>
</div>
<div class="footer-about">
<h4 class="footer-title">About Us</h4>
<ul class="footer-link">
<li><a title="" href="{{store url=""}}about-magento-demo-store">About Trip</a></li>
<li><a title="" href="{{store url=""}}contacts">Contact Us</a></li>
<li><a title="" href="#">Partners</a></li>
<li><a title="" href="#">Careers</a></li>
<li><a title="" href="#">Store Finder</a></li>
</ul>
</div>
EOB
);
$footer_information	=	$block->setData($dataBlock)->save()->getId();

// 8. EM0059 Footer Follow - em0059_footer_follow
$dataBlock = array(
	'title' => 'EM0059 Footer Follow',
	'identifier' => $prefixBlock.'footer_follow',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="footer-follow-us">
<ul>
<li class="first"><img title="facebook" src="{{skin url='images/i_fb.png'}}" alt="" /><a href="https://www.facebook.com/">Find us on Facebook</a></li>
<li><img title="twitter" src="{{skin url='images/i_tw.png'}}" alt="" /><a href="http://twitter.com/">Make Friend With Twitter</a></li>
<li><img title="vimeo" src="{{skin url='images/i_v.png'}}" alt="" /><a href="http://vimeo.com/">Upload Information on Vimeo</a></li>
<li><img title="youtube" src="{{skin url='images/i_yt.png'}}" alt="" /><a href="http://www.youtube.com/">Watch Us on Youtube</a></li>
<li class="last"><img title="rss" src="{{skin url='images/i_rs.png'}}" alt="" /><a href="#">Find Information on CSS</a></li>
</ul>
</div>
EOB
);
$footer_follow	=	$block->setData($dataBlock)->save()->getId();

// 9. EM0059 Footer Payment - em0059_footer_payment
$dataBlock = array(
	'title' => 'EM0059 Footer Payment',
	'identifier' => $prefixBlock.'footer_payment',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="block block-newsletter">{{block type="newsletter/subscribe" name="left.newsletter" template="newsletter/subscribe.phtml"}}</div>
<div class="footer-payment">
<h2>payment method</h2>
<ul>
<li class="first"><a title="visa" href="#"><img src="{{skin url="images/visa.png"}}" alt="visa" /></a></li>
<li><a title="master_card" href="#"><img src="{{skin url="images/master.png"}}" alt="master_card" /></a></li>
<li><a title="express" href="#"><img src="{{skin url="images/express.png"}}" alt="express" /></a></li>
<li><a title="paypal" href="#"><img src="{{skin url="images/paypal.png"}}" alt="paypal" /></a></li>
<li class="last"><a title="skrill" href="#"><img src="{{skin url="images/social.png"}}" alt="skrill" /></a></li>
</ul>
</div>
EOB
);
$footer_payment	=	$block->setData($dataBlock)->save()->getId();

// 10. EM0059 Footer Copyright Language Currency - em0059_footer_copyright_language_currency
$dataBlock = array(
	'title' => 'EM0059 Footer Copyright Language Currency',
	'identifier' => $prefixBlock.'footer_copyright_language_currency',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="footer-copyright">{{block type="page/html_footer" name="footer_copyright" template="cms/copyright.phtml"}}</div>
<div class="language-currency">
<div class="footer-currency">{{block type="directory/currency" name="currency" template="directory/currency.phtml"}}</div>
<div class="footer-language">{{block type="page/switch" name="store_language" as="store_language" template="page/switch/languages.phtml"}}</div>
</div>
EOB
);
$footer_copyright_language_currency	=	$block->setData($dataBlock)->save()->getId();

// 11. EM0059 Sidebar Callout Banner - em0059_sidebar_callout_banner
$dataBlock = array(
	'title' => 'EM0059 Sidebar Callout Banner',
	'identifier' => $prefixBlock.'sidebar_callout_banner',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="callout-sidebar"><a title="" href="#"><img src="{{skin url="images/media/callout.png"}}" alt="" /></a></div>
EOB
);
$sidebar_callout_banner	=	$block->setData($dataBlock)->save()->getId();

####################################################################################################
# INSERT PAGE
####################################################################################################

/*$dataPage = array(
	'title'				=> 'aaaa',
	'identifier' 		=> $prefixPage.'aaaa',
	'stores'			=> $stores,
	'content_heading'	=> '',
	'content'			=> <<<EOB
aaaa
EOB
,
	'root_template'		=> 'one_column',
);
$page->setData($dataPage)->save();*/

//1. Magento Theme EM Valise Store
$dataPage = array(
	'title'				=> 'Magento Theme EM Valise Store',
	'identifier' 		=> $prefixPage.'home',
	'stores'			=> $stores,
	'content_heading'	=> '',
	'content'			=> <<<EOB
<div>&nbsp;</div>
EOB
,
	'root_template'		=> 'one_column',
);
$homepageId = $page->setData($dataPage)->save()->getId();

//2. Typography
$dataPage = array(
	'title'				=> 'Typography',
	'identifier' 		=> $prefixPage.'typography',
	'stores'			=> $stores,
	'content_heading'	=> '',
	'content'			=> <<<EOB
<h1>Heading H1</h1>
<h2>Heading H2</h2>
<h3>Heading H3</h3>
<h4>Heading H4</h4>
<h5>Heading H5</h5>
<h6>Heading H6</h6>
<ul>
<li>Bullet list 1</li>
<li>Bullet list 2
<ul>
<li>Bullet list 2.1</li>
<li>Bullet list 2.2
<ul>
<li>Bullet list 2.2.1</li>
<li>Bullet list 2.2.2</li>
<li>Bullet list 2.2.3</li>
</ul>
</li>
<li>Bullet list 2.3</li>
</ul>
</li>
<li>Bullet list 3</li>
<li>Bullet list 4
<ul>
<li>Bullet list 4.1</li>
<li>Bullet list 4.2</li>
</ul>
</li>
</ul>
<ol>
<li>Numbered list 1</li>
<li>Numbered list 2<ol>
<li>Numbered list 2.1</li>
<li>Numbered list 2.2<ol>
<li>Numbered list 2.2.1</li>
<li>Numbered list 2.2.2</li>
<li>Numbered list 2.2.3</li>
</ol></li>
<li>Numbered list 2.3</li>
</ol></li>
<li>Numbered list 3<ol>
<li>Numbered list 3.1</li>
<li>Numbered list 3.2</li>
<li>Numbered list 3.3</li>
</ol></li>
</ol><dl><dt>definition title dt</dt><dd>definition description dd</dd><dt>definition title dt</dt><dd>definition description dd</dd></dl>
<p><code>Code tag<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</code></p>
<blockquote>Blockquote tag<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</blockquote>
<pre>Pre tag<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</pre>
<p>table with class <strong>data-table</strong></p>
<table class="data-table">
<thead>
<tr><th>thead th 1</th><th>thead th 2</th><th>thead th 3</th><th>thead th 4</th></tr>
</thead>
<tfoot>
<tr>
<td>tfoot td 1</td>
<td>tfoot td 2</td>
<td>tfoot td 3</td>
<td>tfoot td 4</td>
</tr>
</tfoot>
<tbody>
<tr class="odd">
<td>tbody td1</td>
<td>tbody td2</td>
<td>tbody td3</td>
<td>tbody td4</td>
</tr>
<tr class="even">
<td>tbody td1</td>
<td>tbody td2</td>
<td>tbody td3</td>
<td>tbody td4</td>
</tr>
<tr class="odd">
<td>tbody td1</td>
<td>tbody td2</td>
<td>tbody td3</td>
<td>tbody td4</td>
</tr>
<tr class="even">
<td>tbody td1</td>
<td>tbody td2</td>
<td>tbody td3</td>
<td>tbody td4</td>
</tr>
</tbody>
</table>
<p><strong>Column Layout:</strong></p>
<div class="cols-set-12">
<div class="col3 col-first">
<div class="col-inner">
<p><code> &lt;div class="cols-set-12"&gt;<br /> &lt;div class="col3 col-first"&gt;<br /> &lt;div class="col-inner"&gt;...&lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt; </code></p>
</div>
</div>
<div class="col3">
<div class="col-inner">
<p><code> &lt;div class="cols-set-12"&gt;<br /> &lt;div class="col3"&gt;<br /> &lt;div class="col-inner"&gt;...&lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt; </code></p>
</div>
</div>
<div class="col6 col-last">
<div class="col-inner">
<p><code> &lt;div class="cols-set-12"&gt;<br /> &lt;div class="col6 col-last"&gt;<br /> &lt;div class="col-inner"&gt;...&lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt; </code></p>
</div>
</div>
</div>
<p>Text after column layout</p>
<div class="cols-set-12">
<div class="col2 col-first">
<div class="col-inner">
<p><code> &lt;div class="cols-set-12"&gt;<br /> &lt;div class="col2 col-first"&gt;<br /> &lt;div class="col-inner"&gt;...&lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt; </code></p>
</div>
</div>
<div class="col2">
<div class="col-inner">
<p><code> &lt;div class="cols-set-12"&gt;<br /> &lt;div class="col2"&gt;<br /> &lt;div class="col-inner"&gt;...&lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt; </code></p>
</div>
</div>
<div class="col2">
<div class="col-inner">
<p><code> &lt;div class="cols-set-12"&gt;<br /> &lt;div class="col2"&gt;<br /> &lt;div class="col-inner"&gt;...&lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt; </code></p>
</div>
</div>
<div class="col2">
<div class="col-inner">
<p><code> &lt;div class="cols-set-12"&gt;<br /> &lt;div class="col2"&gt;<br /> &lt;div class="col-inner"&gt;...&lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt; </code></p>
</div>
</div>
<div class="col2">
<div class="col-inner">
<p><code> &lt;div class="cols-set-12"&gt;<br /> &lt;div class="col2"&gt;<br /> &lt;div class="col-inner"&gt;...&lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt; </code></p>
</div>
</div>
<div class="col2 col-last">
<div class="col-inner">
<p><code> &lt;div class="cols-set-12"&gt;<br /> &lt;div class="col2 col-last"&gt;<br /> &lt;div class="col-inner"&gt;...&lt;/div&gt;<br /> &lt;/div&gt;<br /> &lt;/div&gt; </code></p>
</div>
</div>
</div>
EOB
,
	'root_template'		=> 'one_column',
);
$page->setData($dataPage)->save();

####################################################################################################
# INSERT Widget Instance
####################################################################################################
$package_theme		=	'default/em0059';

// 1. EM0059 Main Slideshow
$widget = array(	
	'title' => 'EM0059 Main Slideshow',	
	'store_ids' => $stores,	
	'widget_parameters'	=> <<<EOB
a:45:{s:5:"text1";s:250:"<div><h4 class="main-slideshow-title">Lorem Ispum Dolor</h4><p class="main-slideshow-text">Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator</p><p><a href="#"><span>Shop Now</span></a></p></div>";s:4:"url1";s:14:"furniture.html";s:6:"image1";s:14:"slideshow1.jpg";s:5:"text2";s:250:"<div><h4 class="main-slideshow-title">Lorem Ispum Dolor</h4><p class="main-slideshow-text">Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator</p><p><a href="#"><span>Shop Now</span></a></p></div>";s:4:"url2";s:14:"furniture.html";s:6:"image2";s:14:"slideshow2.jpg";s:5:"text3";s:250:"<div><h4 class="main-slideshow-title">Lorem Ispum Dolor</h4><p class="main-slideshow-text">Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator</p><p><a href="#"><span>Shop Now</span></a></p></div>";s:4:"url3";s:14:"furniture.html";s:6:"image3";s:14:"slideshow1.jpg";s:5:"text4";s:0:"";s:4:"url4";s:0:"";s:6:"image4";s:0:"";s:5:"text5";s:0:"";s:4:"url5";s:0:"";s:6:"image5";s:0:"";s:5:"text6";s:0:"";s:4:"url6";s:0:"";s:6:"image6";s:0:"";s:5:"text7";s:0:"";s:4:"url7";s:0:"";s:6:"image7";s:0:"";s:5:"text8";s:0:"";s:4:"url8";s:0:"";s:6:"image8";s:0:"";s:5:"text9";s:0:"";s:4:"url9";s:0:"";s:6:"image9";s:0:"";s:5:"width";s:3:"480";s:6:"height";s:3:"478";s:5:"delay";s:4:"5000";s:13:"displaybutton";s:4:"true";s:9:"autostart";s:4:"true";s:10:"transition";s:6:"random";s:15:"transitionspeed";s:3:"800";s:10:"autocenter";s:5:"false";s:11:"cpanelalign";s:2:"BR";s:14:"cpanelposition";s:6:"inside";s:10:"timeralign";s:3:"top";s:12:"displaytimer";s:4:"true";s:14:"mouseoverpause";s:5:"false";s:15:"cpanelmouseover";s:5:"false";s:13:"textmouseover";s:5:"false";s:10:"texteffect";s:4:"fade";s:8:"textsync";s:4:"true";s:7:"shuffle";s:5:"false";}
EOB
,
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:5:"pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:1:"3";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:4:{s:7:"page_id";s:1:"3";s:3:"for";s:3:"all";s:13:"layout_handle";s:15:"cms_index_index";s:5:"block";s:5:"area2";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('slideshowwidget/create')->setPackageTheme($package_theme)->save();

// 2. EM0059 Top Banner - a:1:{s:8:"block_id";s:1:"8";}
$static_block['block_id']	=	$top_banner;
$widget = array(
	'title' => 'EM0059 Top Banner',
	'store_ids' => $stores,
	'widget_parameters'	=> serialize($static_block),
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:5:"pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:1:"4";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:5:{s:7:"page_id";s:1:"4";s:3:"for";s:3:"all";s:13:"layout_handle";s:15:"cms_index_index";s:5:"block";s:5:"area3";s:8:"template";s:37:"cms/widget/static_block/default.phtml";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('cms/widget_block')->setPackageTheme($package_theme)->save();

// 3. EM0059 Featured Product
$widget = array(	
	'title' => 'EM0059 Featured Product',	
	'store_ids' => $stores,	
	'widget_parameters'	=> <<<EOB
a:8:{s:8:"order_by";s:8:"name asc";s:12:"new_category";a:1:{i:0;s:1:"3";}s:15:"featured_choose";s:8:"Featured";s:12:"column_count";s:1:"5";s:11:"limit_count";s:2:"30";s:15:"choose_template";s:15:"custom_template";s:12:"custom_theme";s:40:"em_featured_products/featured_home.phtml";s:14:"cache_lifetime";s:0:"";}
EOB
,
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:5:"pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:1:"5";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:4:{s:7:"page_id";s:1:"5";s:3:"for";s:3:"all";s:13:"layout_handle";s:15:"cms_index_index";s:5:"block";s:7:"content";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('dynamicproducts/dynamicproducts')->setPackageTheme($package_theme)->save();

// 4. EM0059 Home Banner - a:1:{s:8:"block_id";s:1:"9";}
$static_block['block_id']	=	$home_banner;
$widget = array(
	'title' => 'EM0059 Home Banner',
	'store_ids' => $stores,
	'widget_parameters'	=> serialize($static_block),
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:5:"pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:1:"6";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:5:{s:7:"page_id";s:1:"6";s:3:"for";s:3:"all";s:13:"layout_handle";s:15:"cms_index_index";s:5:"block";s:5:"area4";s:8:"template";s:37:"cms/widget/static_block/default.phtml";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('cms/widget_block')->setPackageTheme($package_theme)->save();

// 5. EM0059 Home Editor Pick
$widget = array(	
	'title' => 'EM0059 Home Editor Pick',	
	'store_ids' => $stores,	
	'widget_parameters'	=> <<<EOB
a:8:{s:8:"order_by";s:8:"name asc";s:12:"new_category";a:1:{i:0;s:1:"3";}s:15:"featured_choose";s:3:"Hot";s:12:"column_count";s:1:"3";s:11:"limit_count";s:2:"30";s:15:"choose_template";s:15:"custom_template";s:12:"custom_theme";s:38:"em_featured_products/editor_pick.phtml";s:14:"cache_lifetime";s:0:"";}
EOB
,
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:5:"pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"12";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:4:{s:7:"page_id";s:2:"12";s:3:"for";s:3:"all";s:13:"layout_handle";s:15:"cms_index_index";s:5:"block";s:5:"area6";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('dynamicproducts/dynamicproducts')->setPackageTheme($package_theme)->save();

// 6. EM0059 Footer Slideshow - a:1:{s:8:"block_id";s:2:"10";}
$static_block['block_id']	=	$footer_slideshow;
$widget = array(
	'title' => 'EM0059 Footer Slideshow',
	'store_ids' => $stores,
	'widget_parameters'	=> serialize($static_block),
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:9:"all_pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:5:{s:7:"page_id";s:2:"13";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";s:5:"block";s:5:"area7";s:8:"template";s:37:"cms/widget/static_block/default.phtml";}s:5:"pages";a:3:{s:7:"page_id";s:2:"13";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('cms/widget_block')->setPackageTheme($package_theme)->save();

// 7. EM0059 Home Tab New Arrivals
$widget = array(	
	'title' => 'EM0059 Home Tab New Arrivals',	
	'store_ids' => $stores,	
	'widget_parameters'	=> <<<EOB
a:7:{s:8:"order_by";s:8:"name asc";s:12:"new_category";a:1:{i:0;s:1:"3";}s:11:"limit_count";s:2:"21";s:12:"column_count";s:1:"3";s:15:"choose_template";s:15:"custom_template";s:12:"custom_theme";s:34:"em_new_products/new_arrivals.phtml";s:14:"cache_lifetime";s:0:"";}
EOB
,
	'sort_order' => 0
);
$newarrival = $widgetInstance->setData($widget)->setType('newproducts/list')->setPackageTheme($package_theme)->save();
$arrivalid = $newarrival->getId();

// 8. EM0059 Home Tab Bestseller
$widget = array(	
	'title' => 'EM0059 Home Tab Bestseller',	
	'store_ids' => $stores,	
	'widget_parameters'	=> <<<EOB
a:7:{s:8:"order_by";s:8:"name asc";s:12:"new_category";a:1:{i:0;s:1:"3";}s:11:"limit_count";s:2:"21";s:12:"column_count";s:1:"3";s:15:"choose_template";s:15:"custom_template";s:12:"custom_theme";s:43:"em_bestseller_products/bestseller_tab.phtml";s:14:"cache_lifetime";s:0:"";}
EOB
,
	'sort_order' => 0
);
$bestseller = $widgetInstance->setData($widget)->setType('bestsellerproducts/list')->setPackageTheme($package_theme)->save();
$bestid = $bestseller->getId();

//9. Home Tabs
$widget = array(	
	'title' => 'EM0059 Home Tabs',	
	'store_ids' => $stores,	
	'widget_parameters'	=> <<<EOB
a:31:{s:7:"title_1";a:22:{i:0;s:12:"New Arrivals";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:7:"block_1";s:0:"";s:10:"instance_1";s:1:"7";s:7:"title_2";a:22:{i:0;s:11:"Best Seller";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:7:"block_2";s:0:"";s:10:"instance_2";s:1:"8";s:7:"title_3";a:22:{i:0;s:12:"Most Popular";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:7:"block_3";s:0:"";s:10:"instance_3";s:2:"13";s:7:"title_4";a:22:{i:0;s:0:"";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:7:"block_4";s:0:"";s:10:"instance_4";s:0:"";s:7:"title_5";a:22:{i:0;s:0:"";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:7:"block_5";s:0:"";s:10:"instance_5";s:0:"";s:7:"title_6";a:22:{i:0;s:0:"";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:7:"block_6";s:0:"";s:10:"instance_6";s:0:"";s:7:"title_7";a:22:{i:0;s:0:"";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:7:"block_7";s:0:"";s:10:"instance_7";s:0:"";s:7:"title_8";a:22:{i:0;s:0:"";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:7:"block_8";s:0:"";s:10:"instance_8";s:0:"";s:7:"title_9";a:22:{i:0;s:0:"";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:7:"block_9";s:0:"";s:10:"instance_9";s:0:"";s:8:"title_10";a:22:{i:0;s:0:"";i:1;s:0:"";i:4;s:0:"";i:6;s:0:"";i:8;s:0:"";i:10;s:0:"";i:12;s:0:"";i:14;s:0:"";i:3;s:0:"";i:15;s:0:"";i:2;s:0:"";i:16;s:0:"";i:17;s:0:"";i:18;s:0:"";i:19;s:0:"";i:20;s:0:"";i:21;s:0:"";i:5;s:0:"";i:7;s:0:"";i:9;s:0:"";i:11;s:0:"";i:13;s:0:"";}s:8:"block_10";s:0:"";s:11:"instance_10";s:0:"";s:8:"instance";s:2:"23";}
EOB
,
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:5:"pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"28";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:5:{s:7:"page_id";s:2:"28";s:3:"for";s:3:"all";s:13:"layout_handle";s:15:"cms_index_index";s:5:"block";s:5:"area5";s:8:"template";s:18:"emtabs/group.phtml";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('tabs/group')->setPackageTheme($package_theme)->save();

// 10. EM0059 Footer Our Blog - a:1:{s:8:"block_id";s:2:"11";}
$static_block['block_id']	=	$footer_our_blog;
$widget = array(
	'title' => 'EM0059 Footer Our Blog',
	'store_ids' => $stores,
	'widget_parameters'	=> serialize($static_block),
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:9:"all_pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:5:{s:7:"page_id";s:2:"14";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";s:5:"block";s:5:"area8";s:8:"template";s:37:"cms/widget/static_block/default.phtml";}s:5:"pages";a:3:{s:7:"page_id";s:2:"14";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('cms/widget_block')->setPackageTheme($package_theme)->save();

// 11. EM0059 Footer Information - a:1:{s:8:"block_id";s:2:"12";}
$static_block['block_id']	=	$footer_information;
$widget = array(
	'title' => 'EM0059 Footer Information',
	'store_ids' => $stores,
	'widget_parameters'	=> serialize($static_block),
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:9:"all_pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:5:{s:7:"page_id";s:2:"15";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";s:5:"block";s:5:"area9";s:8:"template";s:37:"cms/widget/static_block/default.phtml";}s:5:"pages";a:3:{s:7:"page_id";s:2:"15";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('cms/widget_block')->setPackageTheme($package_theme)->save();

// 12. EM0059 Footer Payment - a:1:{s:8:"block_id";s:2:"13";}
$static_block['block_id']	=	$footer_payment;
$widget = array(
	'title' => 'EM0059 Footer Payment',
	'store_ids' => $stores,
	'widget_parameters'	=> serialize($static_block),
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:9:"all_pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:5:{s:7:"page_id";s:2:"16";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";s:5:"block";s:6:"area10";s:8:"template";s:37:"cms/widget/static_block/default.phtml";}s:5:"pages";a:3:{s:7:"page_id";s:2:"16";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('cms/widget_block')->setPackageTheme($package_theme)->save();

//13 EM0059 Home Tab Top Rating
$widget = array(	
	'title' => 'EM0059 Home Tab Top Rating',	
	'store_ids' => $stores,	
	'widget_parameters'	=> <<<EOB
a:7:{s:12:"new_category";a:1:{i:0;s:1:"3";}s:12:"column_count";s:1:"3";s:11:"limit_count";s:2:"21";s:21:"minimum_reviews_count";s:1:"3";s:15:"choose_template";s:15:"custom_template";s:12:"custom_theme";s:37:"em_topratingproducts/top_rating.phtml";s:14:"cache_lifetime";s:0:"";}
EOB
,
	'sort_order' => 0
);
$toprating = $widgetInstance->setData($widget)->setType('topratingproducts/list')->setPackageTheme($package_theme)->save();
$topid = $toprating->getId();

// 14. EM0059 Footer Follow - a:1:{s:8:"block_id";s:2:"14";}
$static_block['block_id']	=	$footer_follow;
$widget = array(
	'title' => 'EM0059 Footer Follow',
	'store_ids' => $stores,
	'widget_parameters'	=> serialize($static_block),
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:9:"all_pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:5:{s:7:"page_id";s:2:"17";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";s:5:"block";s:6:"area11";s:8:"template";s:37:"cms/widget/static_block/default.phtml";}s:5:"pages";a:3:{s:7:"page_id";s:2:"17";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('cms/widget_block')->setPackageTheme($package_theme)->save();

// 15. EM0059 Footer Copyright Language Currency - a:1:{s:8:"block_id";s:2:"15";}
$static_block['block_id']	=	$footer_copyright_language_currency;
$widget = array(
	'title' => 'EM0059 Footer Copyright Language Currency',
	'store_ids' => $stores,
	'widget_parameters'	=> serialize($static_block),
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:12:{s:10:"page_group";s:9:"all_pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:5:{s:7:"page_id";s:2:"18";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";s:5:"block";s:6:"area12";s:8:"template";s:37:"cms/widget/static_block/default.phtml";}s:5:"pages";a:3:{s:7:"page_id";s:2:"18";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('cms/widget_block')->setPackageTheme($package_theme)->save();


// 16. EM0059 Sidebar Lastest Review
$widget = array(	
	'title' => 'EM0059 Sidebar Lastest Review',	
	'store_ids' => $stores,	
	'widget_parameters'	=> <<<EOB
a:6:{s:12:"new_category";a:1:{i:0;s:1:"3";}s:11:"limit_count";s:1:"3";s:12:"column_count";s:1:"1";s:15:"choose_template";s:15:"custom_template";s:12:"custom_theme";s:42:"em_recentviewproducts/lastest_review.phtml";s:14:"cache_lifetime";s:0:"";}
EOB
,
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:4:{i:3;a:12:{s:10:"page_group";s:17:"anchor_categories";s:17:"anchor_categories";a:7:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:5:"block";s:5:"right";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"26";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"26";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}i:2;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"25";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"25";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"25";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:5:"right";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"25";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"25";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"25";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"25";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"pa
ge_id";s:2:"25";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"25";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"25";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"25";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}i:1;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:7:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:4:"left";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"21";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"21";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}i:0;a:12:{s:10:"page_group";s:17:"anchor_categories";s:17:"anchor_categories";a:7:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:5:"block";s:4:"left";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped"
;s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"19";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"19";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('recentreviewproducts/list')->setPackageTheme($package_theme)->save();

// 17. EM0059 Sidebar Callout Banner
$static_block['block_id']	=	$sidebar_callout_banner;
$widget = array(
	'title' => 'EM0059 Sidebar Callout Banner',
	'store_ids' => $stores,
	'widget_parameters'	=> serialize($static_block),
	'sort_order' => 0,
	'page_groups'=>	unserialize(<<<EOB
a:4:{i:3;a:12:{s:10:"page_group";s:17:"anchor_categories";s:17:"anchor_categories";a:8:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:5:"block";s:5:"right";s:8:"template";s:37:"cms/widget/static_block/default.phtml";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"24";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"24";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}i:2;a:12:{s:10:"page_group";s:5:"pages";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"b
undle_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"23";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:5:{s:7:"page_id";s:2:"23";s:3:"for";s:3:"all";s:13:"layout_handle";s:16:"customer_account";s:5:"block";s:4:"left";s:8:"template";s:37:"cms/widget/static_block/default.phtml";}}i:1;a:12:{s:10:"page_group";s:12:"all_products";s:17:"anchor_categories";a:6:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:8:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:5:"block";s:4:"left";s:8:"template";s:37:"cms/widget/static_block/default.phtml";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"22";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"22";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}i:0;a:12:{s:10:"page_group";s:17:"anchor_categories";s:17:"anchor_categories";a:8:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:32:"default,catalog_category_layered";s:3:"for";s:3:"all";s:5:"block";s:4:"left";s:8:"template";s:37:"cms/widget/static_block/default.phtml";s:14:"is_anchor_only";s:1:"1";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:20:"notanchor_categories";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:32:"default,catalog_category_default";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:1:"0";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:12:"all_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:28:"default,catalog_product_view";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:0:"";s:8:"entities";s:0:"";}s:15:"simple_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TY
PE_simple";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"simple";s:8:"entities";s:0:"";}s:16:"grouped_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_grouped";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"grouped";s:8:"entities";s:0:"";}s:21:"configurable_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_configurable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"configurable";s:8:"entities";s:0:"";}s:16:"virtual_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:49:"default,catalog_product_view,PRODUCT_TYPE_virtual";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:7:"virtual";s:8:"entities";s:0:"";}s:15:"bundle_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:48:"default,catalog_product_view,PRODUCT_TYPE_bundle";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:6:"bundle";s:8:"entities";s:0:"";}s:21:"downloadable_products";a:6:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:54:"default,catalog_product_view,PRODUCT_TYPE_downloadable";s:3:"for";s:3:"all";s:14:"is_anchor_only";s:0:"";s:15:"product_type_id";s:12:"downloadable";s:8:"entities";s:0:"";}s:9:"all_pages";a:3:{s:7:"page_id";s:2:"20";s:13:"layout_handle";s:7:"default";s:3:"for";s:3:"all";}s:5:"pages";a:3:{s:7:"page_id";s:2:"20";s:3:"for";s:3:"all";s:13:"layout_handle";s:0:"";}}}
EOB
)
);
$widgetInstance->setData($widget)->setType('cms/widget_block')->setPackageTheme($package_theme)->save();

$installer->endSetup();
