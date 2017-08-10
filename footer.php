<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package C2ST_2017
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<p class="content-subheading">Sign up for our email list</p>
						<form class="form-inline">
							<label class="sr-only" for="emailInput">Email address</label>
							<input type="email" class="form-control" id="emailInput" placeholder="Email address">

							<label class="sr-only" for="emailInput">Submit</label>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
						<p class="content-subheading">Contact us</p>
						<address>
							<p>
								The Chicago Council on Science and Technology<br>
								Illinois Institute of Technology<br>
								10 W 35th St, 10th Floor<br>
								Chicago, IL 60616
							</p>
							<p>
								<abbr title="Telephone:">t:</abbr><a class="tel" href="tel:1+312-567-5835"> 312 567-5835</a><br>
								<abbr title="Fax:">f:</abbr> 312 567-5818<br>
								<abbr title="Email:">e:</abbr> <a href="mailto:info@C2ST.org" title="Email C2ST">info@C2ST.org</a>
							</p>
						</address>
					</div>
					<div class="col-sm-4">
						<p class="content-subheading">
							Donate
						</p>
						<p>
							Your tax deductable contribution enables C2ST to continue our work. Your philanthropy helps C2ST bring science to you. Please consider making a donation to the organization. 
						</p>
						<p>
							C2ST is a nonprofit organization with 501 (c) 3 tax status. Your donation is tax deductible as provided by law.
						</p>
						<a href="/give-now/" class="btn btn-primary">Give now</a>
					</div>
					<div class="col-sm-4">
						<p class="content-subheading">Site Map</p>

						<a href="#" class="content-subheading">About</a>
						<a href="#" class="content-subheading indent">Mission</a>
						<a href="#" class="content-subheading indent">Board of Directors</a>
						<a href="#" class="content-subheading indent">Staff</a>

						<a href="#" class="content-subheading">Events</a>

						<a href="#" class="content-subheading">Initiatives</a>

						<a href="#" class="content-subheading">Library</a>

						<a href="#" class="content-subheading">Membership &amp; Support</a>
						<a href="#" class="content-subheading indent">Membership</a>
						<a href="#" class="content-subheading indent">Support</a>
						<a href="#" class="content-subheading indent">Donate</a>
					</div>
				</div>
			</div>
			<!-- <a href="<?php // echo esc_url( __( 'https://wordpress.org/', 'c2st-2017' ) ); ?>"><?php
			// 	/* translators: %s: CMS name, i.e. WordPress. */
			// 	printf( esc_html__( 'Proudly powered by %s', 'c2st-2017' ), 'WordPress' );
			// ?></a>
			// <span class="sep"> | </span>
			// <?php
			// 	/* translators: 1: Theme name, 2: Theme author. */
			// 	printf( esc_html__( 'Theme: %1$s by %2$s.', 'c2st-2017' ), 'c2st-2017', '<a href="https://automattic.com/">Anders Pollack</a>' );
			?> -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
