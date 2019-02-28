<?php get_header(); ?>
<div class="container main-container">
  <?php the_breadcrumbs(); ?>

  <h1 class="brochure-heading" style="background-image: url(<?php echo image_uri('chisels-in-row.jpg'); ?>);">Blog</h1>
  <div class="row">
    <div class="col-md-8">
      <?php if (have_posts()): ?>
        <?php while (have_posts()): ?>
          <?php
            the_post();
            the_title('<h2>', '</h2>');
          ?>
          <p class="byline">
            by <?php the_author(); ?>, <?php the_time('F j, Y'); ?>
          </p>

          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div class="col-md-3 offset-md-1">
      sidebar
    </div>
  </div>
</div>
<?php get_footer(); ?>
