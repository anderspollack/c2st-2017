<?php
// Template Name: Home Page
get_header(); ?>

<h1>Home Page template</h1>
				
<?php while ( have_posts() ) : the_post(); ?>
	
	<?php the_content(); ?>

<?php endwhile; // end of the loop ?>

<?php get_footer(); ?>