var WidgetRadiantProgressbarHandler = function ($scope, $) {
	// RADIANTTHEMES PROGRESS BAR.
	$(".rt-progress-bar").each(function(){
		$(this).find(".progress-width").text( $(this).data("progress-bar-width") );
		$(this).find(".progress").css({
			"height": $(this).data("progress-bar-height")
		});
		$(this).find(".progress-bar").css({
			"width": $(this).data("progress-bar-width")
		});
	});
};

jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-progressbar.default",
		WidgetRadiantProgressbarHandler
	);
});
