// RADIANTTHEMES IMAGE GALLERY.
var WidgetRadiantImageGalleryHandler = function ($scope, $) {
    $(".rt-image-gallery").each(function(){
        $(this).find(".owl-carousel").owlCarousel({
            nav: false,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000,
            items: 1,
            thumbs: true,
            thumbImage: true,
        });
        $(this).find(".owl-thumb-item").css({
            "width" : "calc(100% / " + $(this).data("thumbnail-items") + ")" ,
        });
    });

    $(window).load(ImageGalleryBox);
    setTimeout(ImageGalleryBox, 500);
    function ImageGalleryBox() {
        $(".rt-image-gallery-holder.isotope").each(function () {
            $(this).isotope({
                percentPosition: true,
                layoutMode: 'packery',
            });
            $(this).find(".fancybox").fancybox({
                animationEffect: "zoom-in-out",
                animationDuration: 500,
                zoomOpacity: "auto",
            });
        });
    };

    baguetteBox.run('.tz-gallery');


}

jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radiant-image-gallery.default",
        WidgetRadiantImageGalleryHandler
    );
});