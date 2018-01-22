/**
 * Javascript library for template ExtremeMagento
 * @copyright 2007 Quick Solution LTD. All rights reserved.
 * @author Giao L. Trinh <giao.trinh@quicksolutiongroup.com>
 */

var timeout = null;
var touch = false;
var animate = false;
(function($) {

	function menu()
	{
		var Width_ul = 960;
		var Width_li = 0;
		var Width_before = 0;
		var Width_div = 0;
		var Width = 0;
		
		jQuery(".menu a").each(function(){
			jQuery(this).attr("onClick","return true");
		});
		
		$$("#nav").each(function(elem)
		{
			elem.childElements().each(function(li)
			{
				li.addClassName('submenu');
			});

		});


		$$(".menu").each(function(elem)
		{
			elem.childElements().each(function(li)
			{
				li.addClassName('submenu');
				Width_li = li.getWidth();
				Width = Width_ul - Width_before;
				Width_before += Width_li;
				$div = li.select('div')[0];
				if (typeof $div != 'undefined')
				{
					Width_div = $div.getWidth();
					sub = Width_div - Width;
					if (sub > 0)
					{
						$div.addClassName(' position-right')
						li.addClassName('position-right-li')
					}
				}
			});

		});
	}
	document.observe("dom:loaded", function()
	{
		menu();

	});


	function showAgreementPopup(e) {
		jQuery('#checkout-agreements label.a-click').parent().parent().children('.agreement-content').show()
			.css({
				'left': (parseInt(document.viewport.getWidth()) - jQuery('#checkout-agreements label.a-click').parent().parent().children('.agreement-content').width())/2 +'px',
				'top': (parseInt(document.viewport.getHeight()) - jQuery('#checkout-agreements label.a-click').parent().parent().children('.agreement-content').height())/2 + 'px'
			});
	}

	function hideAgreementPopup(e) {
		jQuery('#checkout-agreements .agreement-content').hide();
		
	}
	
	function hoverUl() {
		$('#select-store').each(function() {
			$(this).insertUl();
			$(this).selectUl();
		});
	};
	$(document).ready(function() {
		domLoaded = true;
		hoverUl();
	});
})(jQuery);