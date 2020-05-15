<?php
/**
 * Footer Default Section
 *
 * @package ryse
 */
?>

<?php
if ( 'footer-default' === ryse_global_var( 'footer-style', '', false ) ) {
	include get_parent_theme_file_path( 'inc/footer/footer-style-one.php' );
} elseif ( 'footer-custom' === ryse_global_var( 'footer-style', '', false ) ) {
	include get_parent_theme_file_path( 'inc/footer/footer-custom.php' );
} else {
	?>
<!-- wraper_footer -->
<footer class="wraper_footer style-default">
	<!-- wraper_footer_copyright -->
	<div class="wraper_footer_copyright">
		<div class="container">
			<!-- footer_copyright -->
			<div class="row footer_copyright">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- footer_copyright_item -->
					<div class="footer_copyright_item text-center">
						<p><?php echo esc_html__( '© ', 'ryse' ); ?><?php echo esc_html( date( 'Y' ) ); ?><?php echo esc_html__( ' RYSE Theme. RadiantThemes ', 'ryse' ); ?></p>
					</div>
					<!-- footer_copyright_item -->
				</div>
			</div>
			<!-- footer_copyright -->
		</div>
	</div>
	<!-- wraper_footer_copyright -->
</footer>
<!-- wraper_footer -->
	<?php
} ?>
