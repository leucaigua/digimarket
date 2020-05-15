var WidgetRadiantBlogHandler = function ($scope, $) {
	// RADIANTTHEMES BLOG ELEMENT.
	$(".blog.owl-carousel").each(function () {
		$(this).owlCarousel({
			nav: $(this).data("owl-nav"),
			dots: $(this).data("owl-dots"),
			loop: $(this).data("owl-loop"),
			autoplay: $(this).data("owl-autoplay"),
			autoplayTimeout: $(this).data("owl-autoplay-timeout"),
			responsive: {
				0: { items: $(this).data("owl-mobile-items") },
				321: { items: $(this).data("owl-mobile-items") },
				480: { items: $(this).data("owl-tab-items") },
				768: { items: $(this).data("owl-tab-items") },
				992: { items: $(this).data("owl-desktop-items") },
				1200: { items: $(this).data("owl-desktop-items") }
			}
		});
	});
	$(".blog:not(.owl-carousel)").each(function () {
		$(this).children().css({
			"width": "calc(100% / " + $(this).data("row-items") + ")",
		});
	});
	$(".blog.isotope:not(.owl-carousel)").each(function(){
		$(this).isotope({
	        layoutMode: 'masonry',
	    });
    });
}
jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-blog.default",
		WidgetRadiantBlogHandler
	);
});