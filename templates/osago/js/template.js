// check and define $ as jQuery
if (typeof jQuery != "undefined") jQuery(function ($) {
    
    // dump(myVar); is wrapper for console.log() with check existing console object and show 
    window.dump=function(vars,name,showTrace){if(typeof console=="undefined")return false;if(typeof vars=="string"||typeof vars=="array")var type=" ("+typeof vars+", "+vars.length+")";else var type=" ("+typeof vars+")";if(typeof vars=="string")vars='"'+vars+'"';if(typeof name=="undefined")name="..."+type+" = ";else name+=type+" = ";if(typeof showTrace=="undefined")showTrace=false;console.log(name,vars);if(showTrace)console.trace();return true};

    // remove no-js class if JavaScript enabled
    $('html.no-js').removeClass('no-js').addClass('js-ready');

    // close Joomla system messages (just example)
    $('#system-message .close').click(function () {
        $(this).closest('.alert').animate({height: 0, opacity: 0, MarginBottom: 0}, 'slow', function () {
            $(this).remove();
        });
        return false;
    });

    // your JavaScript and jQuery code here
    // alert('JS Test!');

});

// Partners slider
jQuery(document).ready(function() {
	jQuery('.jcarousel').jcarousel({
		scroll: 1, //листать по 1 элементу
		wrap: "circular", //после последнего показывать первый слайд
	});
	
	jQuery('.jcarousel-control-prev').jcarouselControl({
		target: '-=1'
	});

	jQuery('.jcarousel-control-next').jcarouselControl({
		target: '+=1'
	});
	
	// Автопрокрутка слайдера
	jQuery('.jcarousel').jcarouselAutoscroll({
		interval: 3000,
		target: '+=1',
		autostart: true
	});
	
	// Додаємо клас для позначення активної кнопки FAQ
	if(window.location.pathname == "/component/smfaq/category/10-main") {
		jQuery(".item-110").addClass('active-faq');
	}
	
	jQuery('.mod-button').click(function() {
		type = jQuery(this).attr('data-type');
		
		jQuery('.overlay-container').fadeIn(function() {
			
			window.setTimeout(function(){
				jQuery('.window-container.'+type).addClass('window-container-visible');
			}, 100);
			
		});
	});
	
	jQuery('.mod-close').click(function() {
		jQuery('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
	});
	
	jQuery(".item-107 a").click(function(){
		var selected = jQuery(this).attr('href');
		jQuery.scrollTo(selected, 600);		
		return false;
	});	
	
	if(window.location.pathname != "/") {
		jQuery('.item-107 a').attr("href", "/#map");
	}

	if(window.location.pathname.match(/kalkulyator/)) {
		jQuery('.item-page').css('padding', '0 0 25px');
	}

	jQuery('#resultsTab a').click(function (e) {
		e.preventDefault();
		jQuery(this).tab('show');
	})
	jQuery('#resultsTab a').click(function (e) {
		e.preventDefault();
		jQuery(this).tab('show');
	})

});
