/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */

;(function($){
	$.fn.superfish = function(op){

		var sf = $.fn.superfish,
			c = sf.c,
			$arrow = $(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),
			over = function(){
				var $$ = $(this), menu = getMenu($$);
				clearTimeout(menu.sfTimer);
				$$.showSuperfishUl().siblings().hideSuperfishUl();
			},
			out = function(){
				var $$ = $(this), menu = getMenu($$), o = sf.op;
				clearTimeout(menu.sfTimer);
				menu.sfTimer=setTimeout(function(){
					o.retainPath=($.inArray($$[0],o.$path)>-1);
					$$.hideSuperfishUl();
					if (o.$path.length && $$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}
				},o.delay);	
			},
			getMenu = function($menu){
				var menu = $menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
				sf.op = sf.o[menu.serial];
				return menu;
			},
			addArrow = function($a){ $a.addClass(c.anchorClass).append($arrow.clone()); };
			
		return this.each(function() {
			var s = this.serial = sf.o.length;
			var o = $.extend({},sf.defaults,op);
			o.$path = $('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){
				$(this).addClass([o.hoverClass,c.bcClass].join(' '))
					.filter('li:has(ul)').removeClass(o.pathClass);
			});
			sf.o[s] = sf.op = o;
			
			$('li:has(ul)',this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent' : 'hover'](over,out).each(function() {
				if (o.autoArrows) addArrow( $('>a:first-child',this) );
			})
			.not('.'+c.bcClass)
				.hideSuperfishUl();
			
			var $a = $('a',this);
			$a.each(function(i){
				var $li = $a.eq(i).parents('li');
				$a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});
			});
			o.onInit.call(this);
			
		}).each(function() {
			var menuClasses = [c.menuClass];
			if (sf.op.dropShadows  && !($.browser.msie && $.browser.version < 7)) menuClasses.push(c.shadowClass);
			$(this).addClass(menuClasses.join(' '));
		});
	};

	var sf = $.fn.superfish;
	sf.o = [];
	sf.op = {};
	sf.IE7fix = function(){
		var o = sf.op;
		if ($.browser.msie && $.browser.version > 6 && o.dropShadows && o.animation.opacity!=undefined)
			this.toggleClass(sf.c.shadowClass+'-off');
		};
	sf.c = {
		bcClass     : 'sf-breadcrumb',
		menuClass   : 'sf-js-enabled',
		anchorClass : 'sf-with-ul',
		arrowClass  : 'sf-sub-indicator',
		shadowClass : 'sf-shadow'
	};
	sf.defaults = {
		hoverClass	: 'sfHover',
		pathClass	: 'overideThisToUse',
		pathLevels	: 1,
		delay		: 800,
		animation	: {opacity:'show'},
		speed		: 'normal',
		autoArrows	: true,
		dropShadows : true,
		disableHI	: false,		// true disables hoverIntent detection
		onInit		: function(){}, // callback functions
		onBeforeShow: function(){},
		onShow		: function(){},
		onHide		: function(){}
	};
	$.fn.extend({
		hideSuperfishUl : function(){
			var o = sf.op,
				not = (o.retainPath===true) ? o.$path : '';
			o.retainPath = false;
			var $ul = $(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
					.find('>ul').hide().css('visibility','hidden');
			o.onHide.call($ul);
			return this;
		},
		showSuperfishUl : function(){
			var o = sf.op,
				sh = sf.c.shadowClass+'-off',
				$ul = this.addClass(o.hoverClass)
					.find('>ul:hidden').css('visibility','visible');
			sf.IE7fix.call($ul);
			o.onBeforeShow.call($ul);
			$ul.animate(o.animation,o.speed,function(){ sf.IE7fix.call($ul); o.onShow.call($ul); });
			return this;
		}
	});

})(jQuery);



/*
 * Supersubs v0.2b - jQuery plugin
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 *
 * This plugin automatically adjusts submenu widths of suckerfish-style menus to that of
 * their longest list item children. If you use this, please expect bugs and report them
 * to the jQuery Google Group with the word 'Superfish' in the subject line.
 *
 */

;(function($){ // $ will refer to jQuery within this closure

	$.fn.supersubs = function(options){
		var opts = $.extend({}, $.fn.supersubs.defaults, options);
		// return original object to support chaining
		return this.each(function() {
			// cache selections
			var $$ = $(this);
			// support metadata
			var o = $.meta ? $.extend({}, opts, $$.data()) : opts;
			// get the font size of menu.
			// .css('fontSize') returns various results cross-browser, so measure an em dash instead
			var fontsize = $('<li id="menu-fontsize">&#8212;</li>').css({
				'padding' : 0,
				'position' : 'absolute',
				'top' : '-999em',
				'width' : 'auto'
			}).appendTo($$).width(); //clientWidth is faster, but was incorrect here
			// remove em dash
			$('#menu-fontsize').remove();
			// cache all ul elements
			$ULs = $$.find('ul');
			// loop through each ul in menu
			$ULs.each(function(i) {	
				// cache this ul
				var $ul = $ULs.eq(i);
				// get all (li) children of this ul
				var $LIs = $ul.children();
				// get all anchor grand-children
				var $As = $LIs.children('a');
				// force content to one line and save current float property
				var liFloat = $LIs.css('white-space','nowrap').css('float');
				// remove width restrictions and floats so elements remain vertically stacked
				var emWidth = $ul.add($LIs).add($As).css({
					'float' : 'none',
					'width'	: 'auto'
				})
				// this ul will now be shrink-wrapped to longest li due to position:absolute
				// so save its width as ems. Clientwidth is 2 times faster than .width() - thanks Dan Switzer
				.end().end()[0].clientWidth / fontsize;
				// add more width to ensure lines don't turn over at certain sizes in various browsers
				emWidth += o.extraWidth;
				// restrict to at least minWidth and at most maxWidth
				if (emWidth > o.maxWidth)		{ emWidth = o.maxWidth; }
				else if (emWidth < o.minWidth)	{ emWidth = o.minWidth; }
				emWidth += 'em';
				// set ul to width in ems
				$ul.css('width',emWidth);
				// restore li floats to avoid IE bugs
				// set li width to full width of this ul
				// revert white-space to normal
				$LIs.css({
					'float' : liFloat,
					'width' : '100%',
					'white-space' : 'normal'
				})
				// update offset position of descendant ul to reflect new width of parent
				.each(function(){
					var $childUl = $('>ul',this);
					var offsetDirection = $childUl.css('left')!==undefined ? 'left' : 'right';
					$childUl.css(offsetDirection,emWidth);
				});
			});
			
		});
	};
	// expose defaults
	$.fn.supersubs.defaults = {
		minWidth		: 9,		// requires em unit.
		maxWidth		: 25,		// requires em unit.
		extraWidth		: 0			// extra width can ensure lines don't sometimes turn over due to slight browser differences in how they round-off values
	};
	
})(jQuery); // plugin code ends





// Chosen, a Select Box Enhancer for jQuery and Protoype
// by Patrick Filler for Harvest, http://getharvest.com
// 
// Version 0.9.5
// Full source at https://github.com/harvesthq/chosen
// Copyright (c) 2011 Harvest http://getharvest.com

// MIT License, https://github.com/harvesthq/chosen/blob/master/LICENSE.md
// This file is generated by `cake build`, do not edit it by hand.
(function(){var a;a=function(){function a(){this.options_index=0,this.parsed=[]}return a.prototype.add_node=function(a){return a.nodeName==="OPTGROUP"?this.add_group(a):this.add_option(a)},a.prototype.add_group=function(a){var b,c,d,e,f,g;b=this.parsed.length,this.parsed.push({array_index:b,group:!0,label:a.label,children:0,disabled:a.disabled}),f=a.childNodes,g=[];for(d=0,e=f.length;d<e;d++)c=f[d],g.push(this.add_option(c,b,a.disabled));return g},a.prototype.add_option=function(a,b,c){if(a.nodeName==="OPTION")return a.text!==""?(b!=null&&(this.parsed[b].children+=1),this.parsed.push({array_index:this.parsed.length,options_index:this.options_index,value:a.value,text:a.text,html:a.innerHTML,selected:a.selected,disabled:c===!0?c:a.disabled,group_array_index:b,classes:a.className,style:a.style.cssText})):this.parsed.push({array_index:this.parsed.length,options_index:this.options_index,empty:!0}),this.options_index+=1},a}(),a.select_to_array=function(b){var c,d,e,f,g;d=new a,g=b.childNodes;for(e=0,f=g.length;e<f;e++)c=g[e],d.add_node(c);return d.parsed},this.SelectParser=a}).call(this),function(){var a,b,c=function(a,b){return function(){return a.apply(b,arguments)}};b=this,a=function(){function a(a,b){this.form_field=a,this.options=b!=null?b:{},this.set_default_values(),this.is_multiple=this.form_field.multiple,this.default_text_default=this.is_multiple?"Select Some Options":"Select an Option",this.setup(),this.set_up_html(),this.register_observers(),this.finish_setup()}return a.prototype.set_default_values=function(){return this.click_test_action=c(function(a){return this.test_active_click(a)},this),this.activate_action=c(function(a){return this.activate_field(a)},this),this.active_field=!1,this.mouse_on_container=!1,this.results_showing=!1,this.result_highlighted=null,this.result_single_selected=null,this.allow_single_deselect=this.options.allow_single_deselect!=null&&this.form_field.options[0].text===""?this.options.allow_single_deselect:!1,this.disable_search_threshold=this.options.disable_search_threshold||0,this.choices=0,this.results_none_found=this.options.no_results_text||"No results match"},a.prototype.mouse_enter=function(){return this.mouse_on_container=!0},a.prototype.mouse_leave=function(){return this.mouse_on_container=!1},a.prototype.input_focus=function(a){if(!this.active_field)return setTimeout(c(function(){return this.container_mousedown()},this),50)},a.prototype.input_blur=function(a){if(!this.mouse_on_container)return this.active_field=!1,setTimeout(c(function(){return this.blur_test()},this),100)},a.prototype.result_add_option=function(a){var b,c;return a.disabled?"":(a.dom_id=this.container_id+"_o_"+a.array_index,b=a.selected&&this.is_multiple?[]:["active-result"],a.selected&&b.push("result-selected"),a.group_array_index!=null&&b.push("group-option"),a.classes!==""&&b.push(a.classes),c=a.style.cssText!==""?' style="'+a.style+'"':"",'<li id="'+a.dom_id+'" class="'+b.join(" ")+'"'+c+">"+a.html+"</li>")},a.prototype.results_update_field=function(){return this.result_clear_highlight(),this.result_single_selected=null,this.results_build()},a.prototype.results_toggle=function(){return this.results_showing?this.results_hide():this.results_show()},a.prototype.results_search=function(a){return this.results_showing?this.winnow_results():this.results_show()},a.prototype.keyup_checker=function(a){var b,c;b=(c=a.which)!=null?c:a.keyCode,this.search_field_scale();switch(b){case 8:if(this.is_multiple&&this.backstroke_length<1&&this.choices>0)return this.keydown_backstroke();if(!this.pending_backstroke)return this.result_clear_highlight(),this.results_search();break;case 13:a.preventDefault();if(this.results_showing)return this.result_select(a);break;case 27:if(this.results_showing)return this.results_hide();break;case 9:case 38:case 40:case 16:case 91:case 17:break;default:return this.results_search()}},a.prototype.generate_field_id=function(){var a;return a=this.generate_random_id(),this.form_field.id=a,a},a.prototype.generate_random_char=function(){var a,b,c;return a="0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ",c=Math.floor(Math.random()*a.length),b=a.substring(c,c+1)},a}(),b.AbstractChosen=a}.call(this),function(){var a,b,c,d,e=Object.prototype.hasOwnProperty,f=function(a,b){function d(){this.constructor=a}for(var c in b)e.call(b,c)&&(a[c]=b[c]);return d.prototype=b.prototype,a.prototype=new d,a.__super__=b.prototype,a},g=function(a,b){return function(){return a.apply(b,arguments)}};d=this,a=jQuery,a.fn.extend({chosen:function(c){return!a.browser.msie||a.browser.version!=="6.0"&&a.browser.version!=="7.0"?a(this).each(function(d){if(!a(this).hasClass("chzn-done"))return new b(this,c)}):this}}),b=function(){function b(){b.__super__.constructor.apply(this,arguments)}return f(b,AbstractChosen),b.prototype.setup=function(){return this.form_field_jq=a(this.form_field),this.is_rtl=this.form_field_jq.hasClass("chzn-rtl")},b.prototype.finish_setup=function(){return this.form_field_jq.addClass("chzn-done")},b.prototype.set_up_html=function(){var b,d,e,f;return this.container_id=this.form_field.id.length?this.form_field.id.replace(/(:|\.)/g,"_"):this.generate_field_id(),this.container_id+="_chzn",this.f_width=this.form_field_jq.outerWidth(),this.default_text=this.form_field_jq.data("placeholder")?this.form_field_jq.data("placeholder"):this.default_text_default,b=a("<div />",{id:this.container_id,"class":"chzn-container"+(this.is_rtl?" chzn-rtl":""),style:"width: "+this.f_width+"px;"}),this.is_multiple?b.html('<ul class="chzn-choices"><li class="search-field"><input type="text" value="'+this.default_text+'" class="default" autocomplete="off" style="width:25px;" /></li></ul><div class="chzn-drop" style="left:-9000px;"><ul class="chzn-results"></ul></div>'):b.html('<a href="javascript:void(0)" class="chzn-single"><span>'+this.default_text+'</span><div><b></b></div></a><div class="chzn-drop" style="left:-9000px;"><div class="chzn-search"><input type="text" autocomplete="off" /></div><ul class="chzn-results"></ul></div>'),this.form_field_jq.hide().after(b),this.container=a("#"+this.container_id),this.container.addClass("chzn-container-"+(this.is_multiple?"multi":"single")),!this.is_multiple&&this.form_field.options.length<=this.disable_search_threshold&&this.container.addClass("chzn-container-single-nosearch"),this.dropdown=this.container.find("div.chzn-drop").first(),d=this.container.height(),e=this.f_width-c(this.dropdown),this.dropdown.css({width:e+"px",top:d+"px"}),this.search_field=this.container.find("input").first(),this.search_results=this.container.find("ul.chzn-results").first(),this.search_field_scale(),this.search_no_results=this.container.find("li.no-results").first(),this.is_multiple?(this.search_choices=this.container.find("ul.chzn-choices").first(),this.search_container=this.container.find("li.search-field").first()):(this.search_container=this.container.find("div.chzn-search").first(),this.selected_item=this.container.find(".chzn-single").first(),f=e-c(this.search_container)-c(this.search_field),this.search_field.css({width:f+"px"})),this.results_build(),this.set_tab_index()},b.prototype.register_observers=function(){this.container.mousedown(g(function(a){return this.container_mousedown(a)},this)),this.container.mouseup(g(function(a){return this.container_mouseup(a)},this)),this.container.mouseenter(g(function(a){return this.mouse_enter(a)},this)),this.container.mouseleave(g(function(a){return this.mouse_leave(a)},this)),this.search_results.mouseup(g(function(a){return this.search_results_mouseup(a)},this)),this.search_results.mouseover(g(function(a){return this.search_results_mouseover(a)},this)),this.search_results.mouseout(g(function(a){return this.search_results_mouseout(a)},this)),this.form_field_jq.bind("liszt:updated",g(function(a){return this.results_update_field(a)},this)),this.search_field.blur(g(function(a){return this.input_blur(a)},this)),this.search_field.keyup(g(function(a){return this.keyup_checker(a)},this)),this.search_field.keydown(g(function(a){return this.keydown_checker(a)},this));if(this.is_multiple)return this.search_choices.click(g(function(a){return this.choices_click(a)},this)),this.search_field.focus(g(function(a){return this.input_focus(a)},this))},b.prototype.search_field_disabled=function(){this.is_disabled=this.form_field_jq.attr("disabled");if(this.is_disabled)return this.container.addClass("chzn-disabled"),this.search_field.attr("disabled",!0),this.is_multiple||this.selected_item.unbind("focus",this.activate_action),this.close_field();this.container.removeClass("chzn-disabled"),this.search_field.attr("disabled",!1);if(!this.is_multiple)return this.selected_item.bind("focus",this.activate_action)},b.prototype.container_mousedown=function(b){var c;if(!this.is_disabled)return c=b!=null?a(b.target).hasClass("search-choice-close"):!1,b&&b.type==="mousedown"&&b.stopPropagation(),!this.pending_destroy_click&&!c?(this.active_field?!this.is_multiple&&b&&(a(b.target)===this.selected_item||a(b.target).parents("a.chzn-single").length)&&(b.preventDefault(),this.results_toggle()):(this.is_multiple&&this.search_field.val(""),a(document).click(this.click_test_action),this.results_show()),this.activate_field()):this.pending_destroy_click=!1},b.prototype.container_mouseup=function(a){if(a.target.nodeName==="ABBR")return this.results_reset(a)},b.prototype.blur_test=function(a){if(!this.active_field&&this.container.hasClass("chzn-container-active"))return this.close_field()},b.prototype.close_field=function(){return a(document).unbind("click",this.click_test_action),this.is_multiple||(this.selected_item.attr("tabindex",this.search_field.attr("tabindex")),this.search_field.attr("tabindex",-1)),this.active_field=!1,this.results_hide(),this.container.removeClass("chzn-container-active"),this.winnow_results_clear(),this.clear_backstroke(),this.show_search_field_default(),this.search_field_scale()},b.prototype.activate_field=function(){return!this.is_multiple&&!this.active_field&&(this.search_field.attr("tabindex",this.selected_item.attr("tabindex")),this.selected_item.attr("tabindex",-1)),this.container.addClass("chzn-container-active"),this.active_field=!0,this.search_field.val(this.search_field.val()),this.search_field.focus()},b.prototype.test_active_click=function(b){return a(b.target).parents("#"+this.container_id).length?this.active_field=!0:this.close_field()},b.prototype.results_build=function(){var a,b,c,e,f,g;c=new Date,this.parsing=!0,this.results_data=d.SelectParser.select_to_array(this.form_field),this.is_multiple&&this.choices>0?(this.search_choices.find("li.search-choice").remove(),this.choices=0):this.is_multiple||this.selected_item.find("span").text(this.default_text),a="",g=this.results_data;for(e=0,f=g.length;e<f;e++)b=g[e],b.group?a+=this.result_add_group(b):b.empty||(a+=this.result_add_option(b),b.selected&&this.is_multiple?this.choice_build(b):b.selected&&!this.is_multiple&&(this.selected_item.find("span").text(b.text),this.allow_single_deselect&&this.selected_item.find("span").first().after('<abbr class="search-choice-close"></abbr>')));return this.search_field_disabled(),this.show_search_field_default(),this.search_field_scale(),this.search_results.html(a),this.parsing=!1},b.prototype.result_add_group=function(b){return b.disabled?"":(b.dom_id=this.container_id+"_g_"+b.array_index,'<li id="'+b.dom_id+'" class="group-result">'+a("<div />").text(b.label).html()+"</li>")},b.prototype.result_do_highlight=function(a){var b,c,d,e,f;if(a.length){this.result_clear_highlight(),this.result_highlight=a,this.result_highlight.addClass("highlighted"),d=parseInt(this.search_results.css("maxHeight"),10),f=this.search_results.scrollTop(),e=d+f,c=this.result_highlight.position().top+this.search_results.scrollTop(),b=c+this.result_highlight.outerHeight();if(b>=e)return this.search_results.scrollTop(b-d>0?b-d:0);if(c<f)return this.search_results.scrollTop(c)}},b.prototype.result_clear_highlight=function(){return this.result_highlight&&this.result_highlight.removeClass("highlighted"),this.result_highlight=null},b.prototype.results_show=function(){var a;return this.is_multiple||(this.selected_item.addClass("chzn-single-with-drop"),this.result_single_selected&&this.result_do_highlight(this.result_single_selected)),a=this.is_multiple?this.container.height():this.container.height()-1,this.dropdown.css({top:a+"px",left:0}),this.results_showing=!0,this.search_field.focus(),this.search_field.val(this.search_field.val()),this.winnow_results()},b.prototype.results_hide=function(){return this.is_multiple||this.selected_item.removeClass("chzn-single-with-drop"),this.result_clear_highlight(),this.dropdown.css({left:"-9000px"}),this.results_showing=!1},b.prototype.set_tab_index=function(a){var b;if(this.form_field_jq.attr("tabindex"))return b=this.form_field_jq.attr("tabindex"),this.form_field_jq.attr("tabindex",-1),this.is_multiple?this.search_field.attr("tabindex",b):(this.selected_item.attr("tabindex",b),this.search_field.attr("tabindex",-1))},b.prototype.show_search_field_default=function(){return this.is_multiple&&this.choices<1&&!this.active_field?(this.search_field.val(this.default_text),this.search_field.addClass("default")):(this.search_field.val(""),this.search_field.removeClass("default"))},b.prototype.search_results_mouseup=function(b){var c;c=a(b.target).hasClass("active-result")?a(b.target):a(b.target).parents(".active-result").first();if(c.length)return this.result_highlight=c,this.result_select(b)},b.prototype.search_results_mouseover=function(b){var c;c=a(b.target).hasClass("active-result")?a(b.target):a(b.target).parents(".active-result").first();if(c)return this.result_do_highlight(c)},b.prototype.search_results_mouseout=function(b){if(a(b.target).hasClass("active-result"))return this.result_clear_highlight()},b.prototype.choices_click=function(b){b.preventDefault();if(this.active_field&&!a(b.target).hasClass("search-choice")&&!this.results_showing)return this.results_show()},b.prototype.choice_build=function(b){var c,d;return c=this.container_id+"_c_"+b.array_index,this.choices+=1,this.search_container.before('<li class="search-choice" id="'+c+'"><span>'+b.html+'</span><a href="javascript:void(0)" class="search-choice-close" rel="'+b.array_index+'"></a></li>'),d=a("#"+c).find("a").first(),d.click(g(function(a){return this.choice_destroy_link_click(a)},this))},b.prototype.choice_destroy_link_click=function(b){return b.preventDefault(),this.is_disabled?b.stopPropagation:(this.pending_destroy_click=!0,this.choice_destroy(a(b.target)))},b.prototype.choice_destroy=function(a){return this.choices-=1,this.show_search_field_default(),this.is_multiple&&this.choices>0&&this.search_field.val().length<1&&this.results_hide(),this.result_deselect(a.attr("rel")),a.parents("li").first().remove()},b.prototype.results_reset=function(b){this.form_field.options[0].selected=!0,this.selected_item.find("span").text(this.default_text),this.show_search_field_default(),a(b.target).remove(),this.form_field_jq.trigger("change");if(this.active_field)return this.results_hide()},b.prototype.result_select=function(a){var b,c,d,e;if(this.result_highlight)return b=this.result_highlight,c=b.attr("id"),this.result_clear_highlight(),this.is_multiple?this.result_deactivate(b):(this.search_results.find(".result-selected").removeClass("result-selected"),this.result_single_selected=b),b.addClass("result-selected"),e=c.substr(c.lastIndexOf("_")+1),d=this.results_data[e],d.selected=!0,this.form_field.options[d.options_index].selected=!0,this.is_multiple?this.choice_build(d):(this.selected_item.find("span").first().text(d.text),this.allow_single_deselect&&this.selected_item.find("span").first().after('<abbr class="search-choice-close"></abbr>')),(!a.metaKey||!this.is_multiple)&&this.results_hide(),this.search_field.val(""),this.form_field_jq.trigger("change"),this.search_field_scale()},b.prototype.result_activate=function(a){return a.addClass("active-result")},b.prototype.result_deactivate=function(a){return a.removeClass("active-result")},b.prototype.result_deselect=function(b){var c,d;return d=this.results_data[b],d.selected=!1,this.form_field.options[d.options_index].selected=!1,c=a("#"+this.container_id+"_o_"+b),c.removeClass("result-selected").addClass("active-result").show(),this.result_clear_highlight(),this.winnow_results(),this.form_field_jq.trigger("change"),this.search_field_scale()},b.prototype.winnow_results=function(){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r;j=new Date,this.no_results_clear(),h=0,i=this.search_field.val()===this.default_text?"":a("<div/>").text(a.trim(this.search_field.val())).html(),f=new RegExp("^"+i.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&"),"i"),m=new RegExp(i.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&"),"i"),r=this.results_data;for(n=0,p=r.length;n<p;n++){c=r[n];if(!c.disabled&&!c.empty)if(c.group)a("#"+c.dom_id).hide();else if(!this.is_multiple||!c.selected){b=!1,g=c.dom_id;if(f.test(c.html))b=!0,h+=1;else if(c.html.indexOf(" ")>=0||c.html.indexOf("[")===0){e=c.html.replace(/\[|\]/g,"").split(" ");if(e.length)for(o=0,q=e.length;o<q;o++)d=e[o],f.test(d)&&(b=!0,h+=1)}b?(i.length?(k=c.html.search(m),l=c.html.substr(0,k+i.length)+"</em>"+c.html.substr(k+i.length),l=l.substr(0,k)+"<em>"+l.substr(k)):l=c.html,a("#"+g).html!==l&&a("#"+g).html(l),this.result_activate(a("#"+g)),c.group_array_index!=null&&a("#"+this.results_data[c.group_array_index].dom_id).show()):(this.result_highlight&&g===this.result_highlight.attr("id")&&this.result_clear_highlight(),this.result_deactivate(a("#"+g)))}}return h<1&&i.length?this.no_results(i):this.winnow_results_set_highlight()},b.prototype.winnow_results_clear=function(){var b,c,d,e,f;this.search_field.val(""),c=this.search_results.find("li"),f=[];for(d=0,e=c.length;d<e;d++)b=c[d],b=a(b),f.push(b.hasClass("group-result")?b.show():!this.is_multiple||!b.hasClass("result-selected")?this.result_activate(b):void 0);return f},b.prototype.winnow_results_set_highlight=function(){var a,b;if(!this.result_highlight){b=this.is_multiple?[]:this.search_results.find(".result-selected.active-result"),a=b.length?b.first():this.search_results.find(".active-result").first();if(a!=null)return this.result_do_highlight(a)}},b.prototype.no_results=function(b){var c;return c=a('<li class="no-results">'+this.results_none_found+' "<span></span>"</li>'),c.find("span").first().html(b),this.search_results.append(c)},b.prototype.no_results_clear=function(){return this.search_results.find(".no-results").remove()},b.prototype.keydown_arrow=function(){var b,c;this.result_highlight?this.results_showing&&(c=this.result_highlight.nextAll("li.active-result").first(),c&&this.result_do_highlight(c)):(b=this.search_results.find("li.active-result").first(),b&&this.result_do_highlight(a(b)));if(!this.results_showing)return this.results_show()},b.prototype.keyup_arrow=function(){var a;if(!this.results_showing&&!this.is_multiple)return this.results_show();if(this.result_highlight)return a=this.result_highlight.prevAll("li.active-result"),a.length?this.result_do_highlight(a.first()):(this.choices>0&&this.results_hide(),this.result_clear_highlight())},b.prototype.keydown_backstroke=function(){return this.pending_backstroke?(this.choice_destroy(this.pending_backstroke.find("a").first()),this.clear_backstroke()):(this.pending_backstroke=this.search_container.siblings("li.search-choice").last(),this.pending_backstroke.addClass("search-choice-focus"))},b.prototype.clear_backstroke=function(){return this.pending_backstroke&&this.pending_backstroke.removeClass("search-choice-focus"),this.pending_backstroke=null},b.prototype.keydown_checker=function(a){var b,c;b=(c=a.which)!=null?c:a.keyCode,this.search_field_scale(),b!==8&&this.pending_backstroke&&this.clear_backstroke();switch(b){case 8:this.backstroke_length=this.search_field.val().length;break;case 9:this.mouse_on_container=!1;break;case 13:a.preventDefault();break;case 38:a.preventDefault(),this.keyup_arrow();break;case 40:this.keydown_arrow()}},b.prototype.search_field_scale=function(){var b,c,d,e,f,g,h,i,j;if(this.is_multiple){d=0,h=0,f="position:absolute; left: -1000px; top: -1000px; display:none;",g=["font-size","font-style","font-weight","font-family","line-height","text-transform","letter-spacing"];for(i=0,j=g.length;i<j;i++)e=g[i],f+=e+":"+this.search_field.css(e)+";";return c=a("<div />",{style:f}),c.text(this.search_field.val()),a("body").append(c),h=c.width()+25,c.remove(),h>this.f_width-10&&(h=this.f_width-10),this.search_field.css({width:h+"px"}),b=this.container.height(),this.dropdown.css({top:b+"px"})}},b.prototype.generate_random_id=function(){var b;b="sel"+this.generate_random_char()+this.generate_random_char()+this.generate_random_char();while(a("#"+b).length>0)b+=this.generate_random_char();return b},b}(),c=function(a){var b;return b=a.outerWidth()-a.width()},d.get_side_border_padding=c}.call(this);

/* --------------------------------------------------- */


/*
Uniform v1.7.5
Copyright © 2009 Josh Pyles / Pixelmatrix Design LLC
http://pixelmatrixdesign.com

Requires jQuery 1.4 or newer

Much thanks to Thomas Reynolds and Buck Wilson for their help and advice on this

Disabling text selection is made possible by Mathias Bynens <http://mathiasbynens.be/>
and his noSelect plugin. <http://github.com/mathiasbynens/noSelect-jQuery-Plugin>

Also, thanks to David Kaneda and Eugene Bond for their contributions to the plugin

License:
MIT License - http://www.opensource.org/licenses/mit-license.php

Enjoy!
*/
(function(a){a.uniform={options:{selectClass:"selector",radioClass:"radio",checkboxClass:"checker",fileClass:"uploader",filenameClass:"filename",fileBtnClass:"action",fileDefaultText:"No file selected",fileBtnText:"Choose File",checkedClass:"checked",focusClass:"focus",disabledClass:"disabled",buttonClass:"button",activeClass:"active",hoverClass:"hover",useID:true,idPrefix:"uniform",resetSelector:false,autoHide:true},elements:[]};if(a.browser.msie&&a.browser.version<7){a.support.selectOpacity=false}else{a.support.selectOpacity=true}a.fn.uniform=function(b){function k(b){b=a(b).get();if(b.length>1){a.each(b,function(b,c){a.uniform.elements.push(c)})}else{a.uniform.elements.push(b)}}function j(c){var d=a(c);var e=a("<div />"),f=a("<span>"+b.fileDefaultText+"</span>"),g=a("<span>"+b.fileBtnText+"</span>");if(!d.css("display")=="none"&&b.autoHide){e.hide()}e.addClass(b.fileClass);f.addClass(b.filenameClass);g.addClass(b.fileBtnClass);if(b.useID&&d.attr("id")!=""){e.attr("id",b.idPrefix+"-"+d.attr("id"))}d.wrap(e);d.after(g);d.after(f);e=d.closest("div");f=d.siblings("."+b.filenameClass);g=d.siblings("."+b.fileBtnClass);if(!d.attr("size")){var h=e.width();d.attr("size",h/10)}var i=function(){var a=d.val();if(a===""){a=b.fileDefaultText}else{a=a.split(/[\/\\]+/);a=a[a.length-1]}f.text(a)};i();d.css("opacity",0).bind({"focus.uniform":function(){e.addClass(b.focusClass)},"blur.uniform":function(){e.removeClass(b.focusClass)},"mousedown.uniform":function(){if(!a(c).is(":disabled")){e.addClass(b.activeClass)}},"mouseup.uniform":function(){e.removeClass(b.activeClass)},"mouseenter.uniform":function(){e.addClass(b.hoverClass)},"mouseleave.uniform":function(){e.removeClass(b.hoverClass);e.removeClass(b.activeClass)}});if(a.browser.msie){d.bind("click.uniform.ie7",function(){setTimeout(i,0)})}else{d.bind("change.uniform",i)}if(d.attr("disabled")){e.addClass(b.disabledClass)}a.uniform.noSelect(f);a.uniform.noSelect(g);k(c)}function i(c){var d=a(c);var e=a("<div />"),f=a("<span />");if(!d.css("display")=="none"&&b.autoHide){e.hide()}e.addClass(b.radioClass);if(b.useID&&c.attr("id")!=""){e.attr("id",b.idPrefix+"-"+c.attr("id"))}a(c).wrap(e);a(c).wrap(f);f=c.parent();e=f.parent();a(c).css("opacity",0).bind({"focus.uniform":function(){e.addClass(b.focusClass)},"blur.uniform":function(){e.removeClass(b.focusClass)},"click.uniform touchend.uniform":function(){if(!a(c).attr("checked")){f.removeClass(b.checkedClass)}else{var d=b.radioClass.split(" ")[0];a("."+d+" span."+b.checkedClass+":has([name='"+a(c).attr("name")+"'])").removeClass(b.checkedClass);f.addClass(b.checkedClass)}},"mousedown.uniform touchend.uniform":function(){if(!a(c).is(":disabled")){e.addClass(b.activeClass)}},"mouseup.uniform touchbegin.uniform":function(){e.removeClass(b.activeClass)},"mouseenter.uniform touchend.uniform":function(){e.addClass(b.hoverClass)},"mouseleave.uniform":function(){e.removeClass(b.hoverClass);e.removeClass(b.activeClass)}});if(a(c).attr("checked")){f.addClass(b.checkedClass)}if(a(c).attr("disabled")){e.addClass(b.disabledClass)}k(c)}function h(c){var d=a(c);var e=a("<div />"),f=a("<span />");if(!d.css("display")=="none"&&b.autoHide){e.hide()}e.addClass(b.checkboxClass);if(b.useID&&c.attr("id")!=""){e.attr("id",b.idPrefix+"-"+c.attr("id"))}a(c).wrap(e);a(c).wrap(f);f=c.parent();e=f.parent();a(c).css("opacity",0).bind({"focus.uniform":function(){e.addClass(b.focusClass)},"blur.uniform":function(){e.removeClass(b.focusClass)},"click.uniform touchend.uniform":function(){if(!a(c).attr("checked")){f.removeClass(b.checkedClass)}else{f.addClass(b.checkedClass)}},"mousedown.uniform touchbegin.uniform":function(){e.addClass(b.activeClass)},"mouseup.uniform touchend.uniform":function(){e.removeClass(b.activeClass)},"mouseenter.uniform":function(){e.addClass(b.hoverClass)},"mouseleave.uniform":function(){e.removeClass(b.hoverClass);e.removeClass(b.activeClass)}});if(a(c).attr("checked")){f.addClass(b.checkedClass)}if(a(c).attr("disabled")){e.addClass(b.disabledClass)}k(c)}function g(c){var d=a(c);var e=a("<div />"),f=a("<span />");if(!d.css("display")=="none"&&b.autoHide){e.hide()}e.addClass(b.selectClass);if(b.useID&&c.attr("id")!=""){e.attr("id",b.idPrefix+"-"+c.attr("id"))}var g=c.find(":selected:first");if(g.length==0){g=c.find("option:first")}f.html(g.html());c.css("opacity",0);c.wrap(e);c.before(f);e=c.parent("div");f=c.siblings("span");c.bind({"change.uniform":function(){f.text(c.find(":selected").html());e.removeClass(b.activeClass)},"focus.uniform":function(){e.addClass(b.focusClass)},"blur.uniform":function(){e.removeClass(b.focusClass);e.removeClass(b.activeClass)},"mousedown.uniform touchbegin.uniform":function(){e.addClass(b.activeClass)},"mouseup.uniform touchend.uniform":function(){e.removeClass(b.activeClass)},"click.uniform touchend.uniform":function(){e.removeClass(b.activeClass)},"mouseenter.uniform":function(){e.addClass(b.hoverClass)},"mouseleave.uniform":function(){e.removeClass(b.hoverClass);e.removeClass(b.activeClass)},"keyup.uniform":function(){f.text(c.find(":selected").html())}});if(a(c).attr("disabled")){e.addClass(b.disabledClass)}a.uniform.noSelect(f);k(c)}function f(c){var d=a(c);var e=a("<div>"),f=a("<span>");e.addClass(b.buttonClass);if(b.useID&&d.attr("id")!="")e.attr("id",b.idPrefix+"-"+d.attr("id"));var g;if(d.is("a")||d.is("button")){g=d.text()}else if(d.is(":submit")||d.is(":reset")||d.is("input[type=button]")){g=d.attr("value")}g=g==""?d.is(":reset")?"Reset":"Submit":g;f.html(g);d.css("opacity",0);d.wrap(e);d.wrap(f);e=d.closest("div");f=d.closest("span");if(d.is(":disabled"))e.addClass(b.disabledClass);e.bind({"mouseenter.uniform":function(){e.addClass(b.hoverClass)},"mouseleave.uniform":function(){e.removeClass(b.hoverClass);e.removeClass(b.activeClass)},"mousedown.uniform touchbegin.uniform":function(){e.addClass(b.activeClass)},"mouseup.uniform touchend.uniform":function(){e.removeClass(b.activeClass)},"click.uniform touchend.uniform":function(b){if(a(b.target).is("span")||a(b.target).is("div")){if(c[0].dispatchEvent){var d=document.createEvent("MouseEvents");d.initEvent("click",true,true);c[0].dispatchEvent(d)}else{c[0].click()}}}});c.bind({"focus.uniform":function(){e.addClass(b.focusClass)},"blur.uniform":function(){e.removeClass(b.focusClass)}});a.uniform.noSelect(e);k(c)}function e(b){a(b).addClass("uniform");k(b)}function d(b){$el=a(b);$el.addClass($el.attr("type"));k(b)}b=a.extend(a.uniform.options,b);var c=this;if(b.resetSelector!=false){a(b.resetSelector).mouseup(function(){function b(){a.uniform.update(c)}setTimeout(b,10)})}a.uniform.restore=function(b){if(b==undefined){b=a(a.uniform.elements)}a(b).each(function(){if(a(this).is(":checkbox")){a(this).unwrap().unwrap()}else if(a(this).is("select")){a(this).siblings("span").remove();a(this).unwrap()}else if(a(this).is(":radio")){a(this).unwrap().unwrap()}else if(a(this).is(":file")){a(this).siblings("span").remove();a(this).unwrap()}else if(a(this).is("button, :submit, :reset, a, input[type='button']")){a(this).unwrap().unwrap()}a(this).unbind(".uniform");a(this).css("opacity","1");var c=a.inArray(a(b),a.uniform.elements);a.uniform.elements.splice(c,1)})};a.uniform.noSelect=function(b){function c(){return false}a(b).each(function(){this.onselectstart=this.ondragstart=c;a(this).mousedown(c).css({MozUserSelect:"none"})})};a.uniform.update=function(c){if(c==undefined){c=a(a.uniform.elements)}c=a(c);c.each(function(){var d=a(this);if(d.is("select")){var e=d.siblings("span");var f=d.parent("div");f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);e.html(d.find(":selected").html());if(d.is(":disabled")){f.addClass(b.disabledClass)}else{f.removeClass(b.disabledClass)}}else if(d.is(":checkbox")){var e=d.closest("span");var f=d.closest("div");f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);e.removeClass(b.checkedClass);if(d.is(":checked")){e.addClass(b.checkedClass)}if(d.is(":disabled")){f.addClass(b.disabledClass)}else{f.removeClass(b.disabledClass)}}else if(d.is(":radio")){var e=d.closest("span");var f=d.closest("div");f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);e.removeClass(b.checkedClass);if(d.is(":checked")){e.addClass(b.checkedClass)}if(d.is(":disabled")){f.addClass(b.disabledClass)}else{f.removeClass(b.disabledClass)}}else if(d.is(":file")){var f=d.parent("div");var g=d.siblings(b.filenameClass);btnTag=d.siblings(b.fileBtnClass);f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);g.text(d.val());if(d.is(":disabled")){f.addClass(b.disabledClass)}else{f.removeClass(b.disabledClass)}}else if(d.is(":submit")||d.is(":reset")||d.is("button")||d.is("a")||c.is("input[type=button]")){var f=d.closest("div");f.removeClass(b.hoverClass+" "+b.focusClass+" "+b.activeClass);if(d.is(":disabled")){f.addClass(b.disabledClass)}else{f.removeClass(b.disabledClass)}}})};return this.each(function(){if(a.support.selectOpacity){var b=a(this);if(b.is("select")){if(b.attr("multiple")!=true){if(b.attr("size")==undefined||b.attr("size")<=1){g(b)}}}else if(b.is(":checkbox")){h(b)}else if(b.is(":radio")){i(b)}else if(b.is(":file")){j(b)}else if(b.is(":text, :password, input[type='email']")){d(b)}else if(b.is("textarea")){e(b)}else if(b.is("a")||b.is(":submit")||b.is(":reset")||b.is("button")||b.is("input[type=button]")){f(b)}}})}})(jQuery);

