<?php get_header(); ?>

<?php
  $categories = wp_get_post_terms($post->ID, 'brochure_category');
  $brochureCategory = array_shift($categories);

  $client = new TCMaker\Calendar\Eventbrite();
  $events = $client->getUpcomingClasses();
?>

<div class="container main-container">
  <?php the_breadcrumbs(); ?>

  <h1 class="brochure-heading" style="background-image: url(<?php echo image_uri('chisels-in-row.jpg'); ?>);"><?php echo $brochureCategory->name; ?></h1>

  <div class="row">
    <div class="col-md-3">
      <div class="card bg-light mb-3">
        <div class="card-body">
          <h5 class="card-title">Teach a Class</h5>
          <p class="card-text">We are always looking for teachers! Classes are a great way to give back to the community.
          Send an email to <a href="mailto:events@tcmaker.org">events@tcmaker.org</a>, and we’ll
          get back to you to help get your class set up.</p>
        </div>
      </div>
    </div> <!-- col -->

    <div class="col-md-9">
      <h2>Upcoming Classes</h2>

      <p>Our classes are open to members and non-members alike.</p>

      <?php if ($events): ?>
        <?php $counter = 1; ?>
        <div class="row">
          <?php foreach ($events as $event): ?>
            <!-- <h6><?php echo $event->name->html; ?></h6>
            <?php // echo $event->description->html; ?> -->
            <div class="col-sm-4">
              <div class="card mb-4">
                <?php if ($event->logo) {
                  $logoUrl = $event->logo->url;
                } else {
                  $logoUrl = image_uri('eventbrite-placeholder.jpg');
                } ?>
                <img style="max-width: 100%;" src="<?php echo $logoUrl; ?>" class="card-img-top" alt="">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $event->name->html; ?></h5>
                  <p class="card-text">
                    <strong><?php echo date('F j, Y', strtotime($event->start->local)); ?></strong><br>
                    <?php echo date('g:i A', strtotime($event->start->local)); ?> to
                    <?php echo date('g:i A', strtotime($event->end->local)); ?>
                  </p>
                  <!-- <p class="card-text"><?php echo $event->summary; ?></p> -->
                  <a href="<?php echo "/classes/class?event_id={$event->id}"; ?>" class="btn btn-primary">View Detail</a>
                </div>
              </div> <!-- card -->
            </div> <!-- col -->
            <?php if ($counter % 3 == 0): ?>
              </div><div class="row">
            <?php endif; $counter++; ?>
          <?php endforeach; ?>
        </div> <!-- row -->
      <?php endif; ?>
    </div>
  </div> <!-- row -->
</div> <!-- container -->
<?php get_footer(); ?>
