<?php
/**
 * Template Name:Case Study
 *
 * @package ryse
 */
get_header();
?>
<div class="case-study-inner">
<div class="container">
<div class="rt-case-study-box element-two row">
			<?php
			global $wp_query, $meta ,$paged ,$post;    	    	
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args['paged'] = $paged;
			$temp = $wp_query;
			$args = array ( 'post_type' => 'case-studies', 'paged' => $paged,'orderby' => 'ID', 'order' => 'ASC' );
			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ):
			while ($my_query->have_posts()) : $my_query->the_post();					   
			?>
            <div class="rt-case-study-box-item col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="holder">
                  <!--Post-thumbnail -->
                     <div class="pic">
                        <img src="<?php echo  plugins_url( 'radiantthemes-addons/assets/images/Blank-Image-100x70.png' ) ;?>" alt="No Image Found" data-no-retina="" width="400" height="264">
                        <a class="placeholder" href="<?php  echo get_the_permalink() ;?>" style="background-image:url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>)"></a>
                     </div>
                  <!-- Post-thumbnail -->

                  <!--Post-Button -->
                     <div class="post-btn">
                        <a href="<?php the_permalink() ?>" class="post-button">
                        <span class="ti-angle-right"></span>
                        </a>
                     </div>
                  <!--post-Button -->

                   <!--post-Data -->
                     <div class="data matchHeight">
                        <span class="date"><?php echo get_the_date();?></span>
                        <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
                        <p class="excerpt"></p>
                        <div class="post-meta">
                           <span class="author">By <?php the_author()?></span>
                        </div>
                     </div>
                <!--post-Data -->
               </div>
            </div>
			<?php endwhile; wp_reset_query(); ?>
		<?php endif; $wp_query = null; $wp_query = $temp;?>
         </div>
		 <div class="col-md-12">
		<?php
		if (function_exists("pagination")) {
		pagination($my_query->max_num_pages);} 
		
		
		?>
		</div>
</div>
</div>
<?php
get_footer();
