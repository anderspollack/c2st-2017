<?php
/**
 * The template for displaying Single Person pages
 *
 * @package C2ST_2017
 */

get_header(); ?>
<style>
 .person {
 }
 .person main {
     padding: 0;
     margin: 20px 0 60px 60px; 
     display: flex;
     flex-wrap: wrap;
 }
 .person .entry-title {
     flex-basis: 100%;
 }
 .person .avatar {
     max-width: 180px;
     margin-right: 40px;
     margin-bottom: 40px;
 }
 .person img {
     width: 100%;
     height: auto;
 }
 .person .info {
     max-width: 180px;
     margin-right: 80px;
     margin-bottom: 20px;
 }
 .person .title {
     font-size: 21px;
     margin-bottom: 8px;
 }
 .person .title,
 .person .email,
 .person .phone {
     margin-bottom: 8px;
 }
 .bio {
     max-width: 480px;
     margin-right: 40px;
 }
 
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'person' ); ?>>
    <main id="main" class="site-main" role="main">
        <?php the_title( '<h1 class="entry-title">', '</h1>' );
        if (get_field( 'photo' )): ?>
            <div class="avatar">
                <img alt="<?php the_title(); ?>" src="<?php the_field( 'photo' ); ?>"/>
            </div>
        <?php endif; ?>
        <div class="info">
            <div class="title preformatted"><?php the_field( 'title' ); ?></div>
            <div class="email">
                <a href="mailto:<?php the_field( 'email_address' ); ?>">
                    <?php the_field( 'email_address' ); ?>
                </a>
            </div>
            <div class="phone">
                <a href="tel:<?php the_field( 'phone' ); ?>">
                    <?php the_field( 'phone' ); ?>
                </a>
            </div>
        </div>
        <?php if (get_field( 'bio' )): ?>
            <div class="bio">
                <?php the_field( 'bio' ); ?>
            </div>
        <?php endif; ?>
    </main><!-- #main -->
</article>
<?php
// get_sidebar();
get_footer();
