<?php
/**
 * Template for Header Banner
 *
 * @package ryse
 */

?>
	<!-- wraper_header_bannerinner -->
	<div class="wraper_inner_banner">
		<!-- wraper_inner_banner_main -->
		<div class="wraper_inner_banner_main">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- inner_banner_main -->
						<div class="inner_banner_main">
							
							    <?php if ( is_search() ) { ?>
							    <p class="title">
							    <?php echo esc_html__( 'Search', 'ryse' ); ?>
							    <?php } else { ?>
							    <p class="subtitle">
								<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
								<?php } ?>
							</p>
						</div>
						<!-- inner_banner_main -->
					</div>
				</div>
				<!-- row -->
			</div>
		</div>
		<!-- wraper_inner_banner_main -->
	</div>
	<!-- wraper_header_bannerinner -->
