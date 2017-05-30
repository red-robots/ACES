<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="testimonials">

<div id="home-slider">
	<?php 
	// Query the Post type Slides
	$querySlides = array(
		'post_type' => 'testimonial',
		'posts_per_page' => '-1'
	);
	// The Query
	$the_query = new WP_Query( $querySlides );
	?>
	<?php 
	// The Loop
	 if ( $the_query->have_posts()) : ?>
 <div class="line5"><h2>Our Reputation</h2><div class="spacer2"></div></div>
<div class="flexslider">
        <ul class="slides">
        <?php while ( $the_query->have_posts() ) : ?>
			<?php $the_query->the_post(); ?>
            
            <li> 
              
                   <?php the_content();?>
                
            </li>
            
           <?php endwhile; ?>
      	 </ul><!-- slides -->
</div><!-- .flexslider -->
 
 
         <?php endif; // end loop ?>
        
    <?php wp_reset_postdata(); ?>
    
</div><!-- home slider -->

</div><!--testimonials -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
