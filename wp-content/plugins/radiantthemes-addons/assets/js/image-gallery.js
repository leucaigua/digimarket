var WidgetRadiantImageGalleryHandler=function(t,e){function a(){e(".rt-image-gallery-holder.isotope").each(function(){e(this).isotope({percentPosition:!0,layoutMode:"packery"}),e(this).find(".fancybox").fancybox({animationEffect:"zoom-in-out",animationDuration:500,zoomOpacity:"auto"})})}e(".rt-image-gallery").each(function(){e(this).find(".owl-carousel").owlCarousel({nav:!1,dots:!1,loop:!0,autoplay:!0,autoplayTimeout:6e3,items:1,thumbs:!0,thumbImage:!0}),e(this).find(".owl-thumb-item").css({width:"calc(100% / "+e(this).data("thumbnail-items")+")"})}),e(window).load(a),setTimeout(a,500),baguetteBox.run(".tz-gallery")};jQuery(window).on("elementor/frontend/init",function(){elementorFrontend.hooks.addAction("frontend/element_ready/radiant-image-gallery.default",WidgetRadiantImageGalleryHandler)});