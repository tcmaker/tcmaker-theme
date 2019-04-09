<?php get_header(); ?>

<?php
  $categories = wp_get_post_terms($post->ID, 'brochure_category');
  $brochureCategory = array_shift($categories);
?>

<div class="container main-container">
  <?php the_breadcrumbs(); ?>

  <h1 class="brochure-heading" style="background-image: url(<?php echo image_uri('chisels-in-row.jpg'); ?>);"><?php echo $brochureCategory->name; ?></h1>

  <div class="row">
    <div class="col-md-9 order-md-last">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : ?>
          <?php the_post(); ?>
          <h2><?php the_title(); ?></h2>

          <p>
            Twin Cities Maker is located in the Seward neighborhood of Minneapolis.
            We are open to the public every Wednesday night from 7:00 PM to 9:00 PM.
          </p>

          <div class="card bg-light mb-4">
            <div class="row no-gutters">
              <div class="col-md-8 border-md-right">
                <a href="https://www.openstreetmap.org/?mlat=44.95527&mlon=-93.22635#map=19/44.95527/-93.22635">
                  <img style="max-width:100%;" src="<?php echo image_uri('map-to-hack-factory-16x9.png'); ?>" class="card-img" alt="...">
                </a>
              </div>
              <div class="col-md-4">
                <div class="card-body">
                  <h5 class="card-title">Our Location</h5>
                  <address>
                    <strong>Twin Cities Maker</strong><br>
                    3119 E. 26th Street<br>
                    Minneapolis, MN 55406
                  </address>
                </div>
              </div>
            </div>
          </div>

          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

    <div class="col-md-3 order-md-first">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0 card-title">Follow Us</h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="https://tcmaker.eventbrite.com/">EventBrite</a></li>
          <li class="list-group-item"><a href="https://www.facebook.com/groups/85060647690/">Facebook</a></li>
          <li class="list-group-item"><a href="https://github.com/tcmaker">GitHub</a></li>
          <li class="list-group-item"><a href="https://groups.google.com/forum/#!forum/tcmaker">Google Groups</a></li>
          <li class="list-group-item"><a href="https://twitter.com/tcmaker">Twitter</a></li>
        </ul>
      </div>
    </div>

  </div> <!-- row -->
</div> <!-- container -->
<?php get_footer(); ?>
