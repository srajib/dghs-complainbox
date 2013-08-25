
/*
---------------------------------
	LightBox
---------------------------------
*/
  jQuery(document).ready(function(jQuery){
	jQuery('.lightbox').lightbox();
  });

  

/*
---------------------------------
	Forms
---------------------------------
*/
jQuery(function(){
    jQuery("input:checkbox, input:radio, input:file").uniform();
});
jQuery(".chzn-select").chosen(); 
jQuery(".chzn-select-deselect").chosen({allow_single_deselect:true});



/*
---------------------------------
	Alerts
---------------------------------
*/
jQuery('<span class="alert_close"></span>').prependTo('.alert');
jQuery('.alert_close').click(function () {
      jQuery(this).parent(".alert").slideUp(500);
});


/*
---------------------------------
	qTip Tooltips
---------------------------------
*/

jQuery('#demo_16px_icons a span, #demo_24px_icons a span').qtip({

   content: {
      attr: 'class'
   },
   position: {
      my: 'bottom center',
      at: 'top center'
   }
   
});

jQuery('.tip-top').qtip({
   content: {	attr: 'title'	},
   position:{	my: 'bottom center',	at: 'top center'	}
});
jQuery('.tip-bottom').qtip({
   content: {	attr: 'title'	},
   position:{	my: 'top center',	at: 'bottom center'	}
});
jQuery('.tip-left').qtip({
   content: {	attr: 'title'	},
   position:{	my: 'right center',	at: 'left center'	}
});
jQuery('.tip-right').qtip({
   content: {	attr: 'title'	},
   position:{	my: 'left center',	at: 'right center'	}
});

jQuery('.tip-leftbottom').qtip({
   content: {	attr: 'title'	},
   position:{	my: 'right top',	at: 'left bottom'	}
});
jQuery('.tip-lefttop').qtip({
   content: {	attr: 'title'	},
   position:{	my: 'right bottom',	at: 'left top'	}
});

jQuery('.tip-rightbottom').qtip({
   content: {	attr: 'title'	},
   position:{	my: 'left top',	at: 'right bottom'	}
});
jQuery('.tip-righttop').qtip({
   content: {	attr: 'title'	},
   position:{	my: 'left bottom',	at: 'right top'	}
});

/*
---------------------------------
	Show a success message when page is ready [loaded]
---------------------------------
*/

jQuery(document).ready(function(jQuery){
  jQuery().toastmessage('showToast', {
		type     : 'success',
		text: 'Page loaded successfully',
		position : 'bottom-right',
		inEffectDuration: 	1500,
		stayTime: 			1000
  });
});


jQuery(document).ready(function(jQuery){
	$("#quick_task").thumbnailScroller({ 
		scrollerType:"hoverAccelerate", 
		scrollerOrientation:"horizontal", 
		scrollEasing:"easeOutCubic",  //http://jqueryui.com/demos/effect/easing.html
		scrollEasingAmount:800, 
		acceleration:4, 
		scrollSpeed:800, 
		noScrollCenterSpace:10, 
		autoScrolling:0, 
		autoScrollingSpeed:2000, 
		autoScrollingEasing:"easeInOutCubic",  //http://jqueryui.com/demos/effect/easing.html
		autoScrollingDelay:500 
	});
});
