<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'page',
		'page_id'=>'5'
	));

	if ($wp_query->have_posts()) :  while ($wp_query->have_posts()) : $wp_query->the_post();

    $mytext = get_field('banner_text');
    $subtext = get_field('banner_sub_text');
    $image = get_field('banner_image'); 
    // vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
    ?> 
    <div class="banner">
    	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
    	<div class="banner-text">
    		<h2><?php echo $mytext; ?></h2>
    		<?php echo $subtext; ?>
    	</div>
    	<!-- banner text -->
    </div>	
    <!-- banner -->
  
  <div class="row2">
	   <div class="tab1 tab"> 
	   		<h2><?php the_field('experience_title'); ?></h2>
	   		<p><?php the_field('experience_text'); ?></p> 
		</div>
		<!-- tab 1 -->
	   <div class="tab2 tab">
	   		<h2><?php the_field('counseling_title'); ?></h2>
	   		<p><?php the_field('counseling_text'); ?></p>
		</div>
		<!-- tab 2 -->
	   <div class="tab3 tab">
	   		<h2><?php the_field('education_title'); ?></h2>
	   		<p><?php the_field('education_text'); ?></p>
		</div>
		<!-- tab3 -->

	   <div class="tab4 tab">
	   		<h2><?php the_field('commitment_title'); ?></h2>
	   		<p><?php the_field('commitment_text'); ?></p>
		</div>
		<!-- tab4 -->
	</div>
	<!-- row2 -->
	<div class="row3">

	<div class="line1"><h2> Test Dates </h2><div class="spacer"></div></div>		
		<div class="line2">
			<div class="section1">
		<h3> SAT TEST DATES </h3>
			<table class="table">

		<?php 

			$rows = get_field('sat_test_dates', 'option');
		if($rows)
		{
	            echo '<tr>';
	            echo '<th class="col">Test Date</th>';
	            echo '<th class="col">Register By</th>';
	            echo '<th class="col">Late Registration</th>';
	            echo '</tr>';
			foreach($rows as $row)
			{
				echo '<tr>';
				echo '<td class="col">' . $row['test_date'] . '</td>';
				echo '<td class="col">' . $row['register_by'] . '</td>';
				echo '<td class="col">' . $row['scores_released'] . '</td>';
				echo '</tr>';
			}	
			
		}
		?>
		</table>
	</div> <!--section1 -->
		<div class="section2">
				<h3> ACT TEST DATES </h3>
			<table class="table">

		<?php 

			$rows = get_field('act_test_dates', 'option');
		if($rows)
		{
	            echo '<tr>';
	            echo '<th class="col">Test Date</th>';
	            echo '<th class="col">Register By</th>';
	            echo '<th class="col">Late Registration</th>';
	            echo '</tr>';
			foreach($rows as $row)
			{
				echo '<tr>';
				echo '<td class="col">' . $row['test_date'] . '</td>';
				echo '<td class="col">' . $row['register_by'] . '</td>';
				echo '<td class="col">' . $row['scores_released'] . '</td>';
				echo '</tr>';
			}	
			
		}
		?>
			</table>
			</div><!--section2 -->
		</div><!--line2 -->
	</div>
	<!-- row3 -->

	<?php endwhile; //endwhile for main loop
	endif; //endif for main loop?> 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
