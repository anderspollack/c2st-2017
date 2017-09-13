<?php
// Template Name: Initiatives

get_header(); ?>

<div id="initiatives" class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <header class="entry-header">
                    <h1 class="page-title">C2ST Initiatives</h1>
                </header><!-- .entry-header -->
            </div>

            <?php
            $initiatives = new WP_Query( array(
            	'post_type' => 'initiative',
            ) );
            if ( $initiatives -> have_posts() ) :
            	while ( $initiatives -> have_posts() ) :
            		$initiatives -> the_post(); ?>
            		
            		<?php get_template_part( 'template-parts/content', 'library' ); ?>

            	<?php endwhile;
            endif; ?>

        </div><!-- .row -->
	</div><!-- .container -->
</div><!-- .page-section -->

<?php get_footer(); ?>