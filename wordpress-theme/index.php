<?php get_header(); ?>
<div class="container main-container">
  <?php the_breadcrumbs(); ?>

  <h1 class="brochure-heading" style="background-image: url(<?php echo image_uri('chisels-in-row.jpg'); ?>);">Blog</h1>
  <div class="row">
    <div class="col-md-3">
      <div id="sidebar-primary" class="sidebar">
        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
          <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        <?php else : ?>
          <!-- Time to add some widgets! -->
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-9">
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
  </div>
</div>
<?php get_footer(); ?>
