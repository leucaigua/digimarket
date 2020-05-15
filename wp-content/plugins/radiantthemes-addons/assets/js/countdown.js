	// RADIANTTHEMES COUNTDOWN. ELEMENT.
var WidgetRadiantCountdownHandler = function ($scope, $) {
	jQuery(".rt-countdown").each(function(){
		jQuery(this).countdown( jQuery(this).data("countdown") , function(event){
			jQuery(this).html(
			  event.strftime("<div class='time'><strong>%D</strong> Days</div> <div class='time'><strong>%H</strong> Hours</div> <div class='time'><strong>%M</strong> Min</div> <div class='time'><strong>%S</strong> Sec</div>")
			);
		});
	});
};
jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-countdown.default",
		WidgetRadiantCountdownHandler
	);
});