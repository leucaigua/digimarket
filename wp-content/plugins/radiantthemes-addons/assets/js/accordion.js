var WidgetRadiantAccordionHandler = function ($scope, $) {
	// RADIANTTHEMES ACCORDION.
	$(".radiantthemes-accordion-item").each(function () {
		$(this).find(".radiantthemes-accordion-item-body").hide();
		$(this).find(".radiantthemes-accordion-item-title").click(function () {
			$(this).parent().children(".radiantthemes-accordion-item-body").slideToggle("500");
			$(this).parent().toggleClass("radiantthemes-active");
		});
	});
};


jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-accordion.default",
		WidgetRadiantAccordionHandler
	);
});
