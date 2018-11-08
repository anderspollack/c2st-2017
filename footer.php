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
                            <!-- <label class="sr-only" for="emailInput">Email address</label>
                                 <input type="email" class="form-control" id="emailInput" placeholder="Email address">

                                 <label class="sr-only" for="emailInput">Submit</label>
                                 <button type="submit" class="btn btn-primary">Submit</button> -->
                            <a href="https://visitor.r20.constantcontact.com/d.jsp?llr=4robuocab&amp;p=oi&amp;m=1102149892671&amp;sit=edw9ypldb&amp;f=0a0a2dfa-e9dd-492a-a572-03c724f6fcd3" class="btn btn-primary">Sign Up Now</a>

                        </form>
                        <p class="content-subheading">Contact us</p>
                        <?php
                        $address_line_1 = get_theme_mod( 'address_line_1' );
                        $address_line_2 = get_theme_mod( 'address_line_2' );
                        $address_line_3 = get_theme_mod( 'address_line_3' );
                        $address_line_4 = get_theme_mod( 'address_line_4' );

                        $telephone_number = get_theme_mod( 'telephone_number' );
                        $fax_number = get_theme_mod( 'fax_number' );
                        $email_address = get_theme_mod( 'email_address' );

                        ?>
                        <address>
                            <p>
                                <?php echo $address_line_1; ?><br>
                                <?php echo $address_line_2; ?><br>
                                <?php echo $address_line_3; ?><br>
                                <?php echo $address_line_4; ?>
                            </p>
                            <p>
                                <abbr title="Telephone:">t:</abbr><a class="tel" href="tel:<?php echo $telephone_number; ?>"> <?php echo $telephone_number; ?></a><br>
                                <abbr title="Fax:">f:</abbr> <?php echo $fax_number; ?><br>
                                <abbr title="Email:">e:</abbr> <a href="mailto:<?php echo $email_address; ?>" title="Email C2ST"><?php echo $email_address; ?></a>
                            </p>
                        </address>
                    </div>
                    <div class="col-sm-4">
                        <p class="content-subheading">
                            Donate
                        </p>

                        <?php $footer_donation_text = get_theme_mod( 'footer_donation_text' );
                        echo '<p>' . $footer_donation_text . '</p>' ?>

                        <!-- <p>
                             Your tax deductable contribution enables C2ST to continue our work. Your philanthropy helps C2ST bring science to you. Please consider making a donation to the organization. 
                             </p>
                             <p>
                             C2ST is a nonprofit organization with 501 (c) 3 tax status. Your donation is tax deductible as provided by law.
                             </p> -->
                        <a href="<?php echo get_site_url(); ?>/give-now/" class="btn btn-primary">Give now</a>
                        <div class="guidestar">
                            <a href="https://www.guidestar.org/profile/20-8490697" target="_blank">
                                <img style="width: 135px; height: auto" src="<?php echo home_url('/wp-content/uploads/2018/11/put-platinum2018-seal.png'); ?>" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <p class="content-subheading">Site Map</p>

                        <?php $about = get_permalink( 1710 ); ?>

                        <div class="footer-sitemap-heading about">
                            <i class="expander about glyphicon glyphicon-triangle-right" data-heading="about"></i><a id="about" href="<?php echo esc_url( $about ); ?>" class="content-subheading">About</a>
                        </div>
                        <div class="footer-sitemap-section about" data-section="about">
                            <a href="<?php echo esc_url( $about ) . '#mission'?>" class="content-subheading indent">Mission</a>
                            <a href="<?php echo esc_url( $about ) . '#board-of-directors'?>" class="content-subheading indent">Board of Directors</a>
                            <a href="<?php echo esc_url( $about ) . '#auxiliary-board'?>" class="content-subheading indent">Auxiliary Board</a>
                            <a href="<?php echo esc_url( $about ) . '#c2st-collaborators'?>" class="content-subheading indent">C2ST Collaborators</a>

                            <a href="<?php echo esc_url( $about ) . '#c2st-staff'?>" class="content-subheading indent">Staff</a>
                        </div>

                        <a href="<?php echo esc_url( get_permalink( 1714 ) ); ?>" class="content-subheading">Events</a>

                        <a href="<?php echo esc_url( get_permalink( 1716 ) ); ?>" class="content-subheading">Initiatives</a>

                        <a href="<?php echo esc_url( get_permalink( 2034 ) ); ?>" class="content-subheading">Library</a>

                        <div class="footer-sitemap-heading support">
                            <i class="expander support glyphicon glyphicon-triangle-right" data-heading="support"></i><a id="support" href="<?php echo esc_url( get_permalink( 1787 ) ); ?>" class="content-subheading">Support</a>
                        </div>
                        <div class="footer-sitemap-section support" data-section="support">
                            <a href="<?php echo esc_url( get_permalink( 1787 ) ) . '#donate'; ?>" class="content-subheading indent">Donate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
    </div><!-- #page -->
    <script>
     (function($) {
         $(document).ready(function(){
             $('.expander').click(function() {
                 var section = $('[data-section="' + $(this).data('heading') + '"]');
                 if (section.hasClass('expanded')) {
                     section.removeClass('expanded');
                     $(this).css('transform', 'rotate(0)')
                 } else {
                     section.addClass('expanded');
                     $(this).css('transform', 'rotate(90deg)')
                 }
             });
         });
     })( jQuery );
    </script>

    <?php wp_footer(); ?>

</body>
</html>
