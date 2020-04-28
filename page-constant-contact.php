<?php
/*
 * Template Name: Constant Contact
 */

get_header(); ?>

<?php
while ( have_posts() ) : the_post(); ?>
  <style>
  .ctct-inline-form {
    max-width: 80ch;
    margin: 0 auto;
  }

  .ctct-form-defaults {
    background: transparent !important;
  }
  </style>
  <?php the_content(); ?>

<?php endwhile; ?>

<?php
get_footer(); ?>
