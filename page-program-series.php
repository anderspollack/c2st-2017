<?php
// Template Name: Program Series

get_header(); ?>

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            	<header>
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header><!-- .page-header -->
			</div>

			<div class="col-sm-12"><hr></div>
		</div><!-- .row -->

		<main id="main" class="site-main" role="main">
	        

				<?php 
				$terms = get_terms( array(
				    'taxonomy' => 'program_series',
				    'hide_empty' => false,
				) );
				$count = count( $terms );
				$i = 0;
				foreach ( $terms as $term ) :
					$i ++; 

					if ( $i % 2 !== 0 ) : ?>

						<div class="row">
							<div class="col-sm-6 program-series">

								<h3 class="content-title"><?php echo $term->name; ?></h3>
								<p class="program-series-description"><?php echo wpautop( wptexturize( $term->description ) ); ?></p>

							</div>

					<?php else: ?>

							<div class="col-sm-6 program-series">

								<h3 class="content-title"><?php echo $term->name; ?></h3>
								<p class="program-series-description"><?php echo wpautop( wptexturize( $term->description ) ); ?></p>

							</div>
						</div><!-- .row -->

					<?php endif?>

					<?php if ( $count % 2 !== 0 ) : ?>

						</div><!-- .row -->

					<?php endif?>

				<?php endforeach; ?>

			</div><!-- .row -->
		</main><!-- #main -->
	</div><!-- .container -->
</div><!-- .page-section -->

<?php
get_footer();