/*
 * ajaxcart javascript;
 */
 
var em_box;			
document.observe("dom:loaded", function() {
	var containerDiv = $('containerDiv');
	if(containerDiv)
		em_box = new LightboxAJC(containerDiv);
}); 
function cart_form(url)
{	
	var param	=	$('product_addtocart_form').serialize() + '&return_url=' + window.location.href;
	ajax_add(url,param);
}

function ajax_add(url,param)
	{	
		if(typeof param == 'undefined'){
			param = 'return_url=' + window.location.href;
		}	
		//return false;
		var link = url.replace('checkout','ajaxcart').replace('wishlist/index','ajaxcart/wishlist');
		
		var check = url.search("options");		
		if(check > 0){
			window.location.href = url;
		}
		else{
			var tmp		=	url.search("in_cart");
			em_box.open();
			new Ajax.Request(link, {
				parameters:param,
				onSuccess: function(data) {
					/* Reload when add to cart at wishlist detail page */
					if(url.search('wishlist/index') > 0)
						window.location.href = $('ajax_base_url').value + 'wishlist';
					else{	
						if(tmp > 0 ) {
							var host	=	find_host(url);
							window.location.href = host+'checkout/cart/';
						}
						else{
							var my_div = new Element('div');
							my_div.update(data.responseText);
						
							if(!my_div.down('.ajc_error')){
								/* Update Top links */
								if(my_div.down('.top-link-cart')){
									var count_cart = my_div.down('.top-link-cart').innerHTML;								
									$$('.top-link-cart').each(function (el){
										el.innerHTML = count_cart;
									});
								}
								
								/* Update Cart Sidebar */
								if(my_div.down('.block-cart')){
									var ajax_product = my_div.down('.block-cart').innerHTML;	
									$$('.block-cart').each(function (el){
									   el.innerHTML = ajax_product;
									});
								}	
							}
							
							if(my_div.down('#message_ajax'))
								$('ajax_image').update(my_div.down('#message_ajax').innerHTML);
							$('ajax_loading').hide();
							$('ajaxcart_conent').show();
						}
					}
					deleteItem();
				}
			});
		}
	}
	
function setLocation(url){
	var tam		=	url.search("checkout/cart/");
	if(tam > 0)	ajax_add(url);	
	else	window.location.href = url;
}

document.observe("dom:loaded", function() {
	
			var cartInt = setInterval(function(){
				if (typeof productAddToCartForm != 'undefined'){
					
					if(em_box){
						var tam	=	$('product_addtocart_form').serialize();
						var check = tam.search("ajaxcart");		
						if(check < 0){						
							productAddToCartForm.submit = function(url){
								if(this.validator && this.validator.validate()){										
									cart_form($('product_addtocart_form').readAttribute('action'));
									clearInterval(cartInt);
								}
								return false;
							}
						}
					}
				} else {
					clearInterval(cartInt);
				}
			},500);
	
	
	deleteItem();
	Event.observe('closeLink', 'click', function () {					
		em_box.close();
		$('ajax_image').update('');
		$('ajax_loading').show();
		$('ajaxcart_conent').hide();
	});
	
}); 

function deleteItem(){    
	$$('a').each(function(el){
		if(el.href.search('checkout/cart/delete') != -1 && el.href.search('javascript:ajax_del') == -1){
			el.href = 'javascript:ajax_del(\'' + el.href +'\')';
		}
		if(el.up('.truncated')){
			var a	=	el.up('.truncated');			
			a.observe('mouseover', function() {				
				a.down('.truncated_full_value').addClassName('show');	
			});
			a.observe('mouseout', function() {
				a.down('.truncated_full_value').removeClassName('show');			 
			});			
		}
	});    
}

function ajax_del(url){	
		var tmp	=	url.search("checkout/cart/");
		var baseurl		=	url.substr(0,tmp);				
		var tmp_2	=	url.search("/id/")+4;	
		var tmp_3	=	url.search("/uenc/");			
		var id		=	url.substr(tmp_2,tmp_3-tmp_2);
		var link	=	baseurl+'ajaxcart/index/delete/id/'+id;		
		em_box.open();
		new Ajax.Request(link, {					
			onSuccess: function(data) {				
				//result	=	data.responseText;alert(result);				
				$('ajax_content').innerHTML = data.responseText;
				
				if($('ajax_content').down('.top-link-cart')){
					var count_cart = $('ajax_content').down('.top-link-cart').innerHTML;								
					$$('.top-link-cart').each(function (el){
						el.innerHTML = count_cart;
					});
				}
				
				var check	=	$('shopping-cart-table');
				if(check){
				
					if($('ajax_content').down('#shopping-cart-table')){
						var table_cart = $('ajax_content').down('#shopping-cart-table').innerHTML;								
						$$('#shopping-cart-table').each(function (el){
							var field = el.parentNode;
							while ( field.childNodes.length >= 1 )
							{
								field.removeChild( field.firstChild );       
							} 
							table_cart = '<table id="shopping-cart-table" class="data-table cart-table">'+table_cart+'</table>';
							field.innerHTML = table_cart;
						});
						decorateTable('shopping-cart-table');
						
						var price_cart = $('ajax_content').down('.totals').innerHTML;								
						$$('.totals').each(function (el){
							el.innerHTML = price_cart;
						});
					}
					else{
						var table_cart = $('ajax_content').down('.col-main').innerHTML;								
						$$('.col-main').each(function (el){
							el.innerHTML = table_cart;
						});
					}
					
				}
			
				if($('ajax_content').down('.block-cart')){
					var ajax_product = $('ajax_content').down('.block-cart').innerHTML;	
					$$('.block-cart').each(function (el){
					   el.innerHTML = ajax_product;                    
					});
				}		
				$('ajax_content').update('');
				em_box.close();
				deleteItem();
			}
		});

}

function find_host(url)
{
	var tmp		=	url.search("checkout/cart/");
	var str		=	url.substr(0,tmp)
	return str;
}

