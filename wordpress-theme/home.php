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
    </div> <!-- col -->
    <div class="col-md-9">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : ?>
          <article class="archive-listing">
          <?php the_post(); ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="byline">
            by <?php the_author(); ?>, <?php the_time('F j, Y'); ?>
          </p>
          <?php the_content(); ?>
          <div class="card bg-light my-4 blog-metadata">
            <div class="card-body">
              <p class="card-text">
                Posted in <?php the_category(', '); ?>
              </p>
            </div>
          </div>
          </article>
        <?php endwhile; ?>
      <?php endif; ?>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->
<?php get_footer(); ?>
