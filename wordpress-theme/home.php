<?php get_header(); ?>

<div class="container main-container">
  <?php the_breadcrumbs(); ?>

  <h1 class="brochure-heading" style="background-color: #000;">Blog</h1>
  <div class="row">
    <div class="col-md-9">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : ?>
          <?php the_post(); ?>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div> <!-- col -->
</div> <!-- row -->

<?php get_footer(); ?>
