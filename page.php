<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
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

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
					<div class="clear"></div> <!-- clear -->

				</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>
			
			<?php /*
     ------------------------------------
        FAQ's
   ------------------------------------*/ ?>
 <?php if( have_rows('faqs') ): ?>
     <?php while ( have_rows('faqs') ) : ?>
         <?php the_row(); ?>
                    
            <div class="faqrow">
               <div class="question"><div class="question-image"></div><span><?php the_sub_field('question'); ?></span></div>
               <div class="answer"><?php the_sub_field('answer'); ?></div>
            </div><!-- faqrow -->
<?php endwhile; endif; // end faq's ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
