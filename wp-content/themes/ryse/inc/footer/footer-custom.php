<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ryse
 */
?>

	<?php
        
        $footerBuilder_id = ryse_global_var('footer_list_text', '', false);
        $template = get_page_by_path( $footerBuilder_id, OBJECT, 'elementor_library' );
       

    ?>
    <!-- wraper_footer -->
    <?php if ( true == ryse_global_var( 'footer_custom_stucking', '', false ) && ! wp_is_mobile() ) { ?>
        <div class="footer-custom-stucking-container"></div>
        <footer class="wraper_footer custom-footer footer-custom-stucking-mode">
    <?php } else { ?>
        <footer class="wraper_footer custom-footer">
    <?php } ?>
        <div class="container">
            <?php echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template->ID ); ?>
        </div>
    </footer>
    <!-- wraper_footer -->
