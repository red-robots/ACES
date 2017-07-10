<?php
/**
 * Template Name: Testimonials
 *
 * 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php
while ( have_posts() ) : the_post(); 
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<?php $args=array(
			'post_type'=>'testimonial', 
			'posts_per_page'=>-1
			);
			$query=new WP_Query($args);
			if($query->have_posts()):
		?>
						<div class="entry-content">
							<div id="container">
								<?php while($query->have_posts()): $query->the_post();
								?>
									<div class="item">
										<?php the_content();?><p><?php the_field ('signature');?></p>
									</div>
								<?php endwhile;?>
							</div> <!--container -->
						</div><!-- .entry-content -->
					<?php wp_reset_postdata();endif;?>
				</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>
 
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();