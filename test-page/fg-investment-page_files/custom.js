jQuery(document).ready( function () {

var lang = jQuery('html').attr('lang');
if(lang == 'fr-FR') {
	jQuery("#secondary ul.archive_list li").first().html('<a href="/fr/nouvelles">Toutes les dates</a>');  
}

		/*var win_height = jQuery(window).height();

		var hd_height = 350;



		// alert(win_height);



		if ( jQuery('#page').has( "#inner_title2" ) ) {

			alert(1);

		    jQuery('#main').css('min-height', win_height - hd_height);

		}

		else if ( jQuery('#page').has( ".forcefullwidth_wrapper_tp_banner" ) ) {

			alert(2);

		    jQuery('#main').css('min-height', win_height - hd_height);

		}

		else {

			alert(3);

		    jQuery('#main').css('min-height', win_height);

		}*/



		var main_height = jQuery('#main').height();

		var window_height = jQuery(window).height();

		var body_height = jQuery('body').height();



		if(body_height > window_height){

			if((body_height - 190) < window_height){

				jQuery('#main').css('min-height', main_height + 190 - ( body_height - window_height ));	

			}

		}



	//For Menu Bar

	jQuery('#site-navigation li').find('ul').hide();

	jQuery('#site-navigation li').hover(

		function(){

			jQuery(this).find('> ul').slideDown('fast');

		},

		function(){

			jQuery(this).find('ul').hide();

		});	



	jQuery('.graph_heigh').parent().addClass('graph_heigh_outer');

	

	//For Tooltips

	jQuery('#social-icons a').tooltipster({theme: 'tooltipster-shadow'});



	jQuery('.bxslider').bxSlider({

		mode: 'fade',

		speed: 1000,

		captions: true,

		minSlides: 1,

		maxSlides: 1,

		adaptiveHeight: false,

		auto: true,

		preloadImages: 'all',

		pause: 5000,

		autoHover: true 

	});



	

});//end ready

	

	

	 







// jQuery(".wpupg-post-image").css({"display":"none");



// On window load. This waits until images have loaded which is essential

jQuery(window).load(function(){

	

	// Fade in images so there isn't a color "pop" document load and then on window load

	jQuery(".wpupg-post-image").animate({opacity:1},500);

	

	// clone image

	jQuery('.wpupg-post-image').each(function(){

		var el = jQuery(this);

		el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"998","opacity":"0"}).insertBefore(el).queue(function(){

			var el = jQuery(this);

			el.parent().css({"width":this.width,"height":this.height});

			el.dequeue();

		});



		this.src = grayscale(this.src);

	});



	// Fade image 

	jQuery('.wpupg-post-image').mouseover(function(){

		jQuery(this).parent().find('img:first').stop().animate({opacity:1}, 100);

	})

	jQuery('.img_grayscale').mouseout(function(){

		jQuery(this).stop().animate({opacity:0}, 100);

	});		

});



jQuery(window).resize(function(){

	jQuery('.wpupg-post-image').each(function(){

		var el = jQuery(this);

			el.parent().css({"width":this.width,"height":this.height});

			el.dequeue();

	});

});







// Grayscale w canvas method

function grayscale(src){

    var canvas = document.createElement('canvas');

	var ctx = canvas.getContext('2d');

    var imgObj = new Image();

	imgObj.src = src;

	canvas.width = imgObj.width;

	canvas.height = imgObj.height; 

	ctx.drawImage(imgObj, 0, 0); 

	var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);

	for(var y = 0; y < imgPixels.height; y++){

		for(var x = 0; x < imgPixels.width; x++){

			var i = (y * 4) * imgPixels.width + x * 4;

			var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;

			imgPixels.data[i] = avg; 

			imgPixels.data[i + 1] = avg; 

			imgPixels.data[i + 2] = avg;

		}

	}

	ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);

	return canvas.toDataURL();

}

    
