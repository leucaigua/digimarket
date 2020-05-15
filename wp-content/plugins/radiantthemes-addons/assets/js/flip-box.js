var WidgetRadiantFlipboxHandler = function ($scope, $) {
    jQuery(".rt-flip-box").each(function(){
	    jQuery(this).children(".holder").justFlipIt({
    	    FlipX: jQuery(this).data("flip-box-x") ,
    	    Template: jQuery(this).find(".second-card") ,
    	});
    	jQuery(this).find(".first-card").unwrap();
	});
}
jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-flip-box.default",
		WidgetRadiantFlipboxHandler
	);
});