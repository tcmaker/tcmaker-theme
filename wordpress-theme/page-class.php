<?php
  $categories = wp_get_post_terms($post->ID, 'brochure_category');
  $brochureCategory = array_shift($categories);

  $client = new TCMaker\Calendar\Eventbrite('6ZH7YETAG4EEJEWXOHXJ');
  $event = $client->getEvent($_GET['event_id']);

  if ($event['response']['code'] > 299) {
    trigger_page_not_found();
  }

  $event = $event['body'];
  $event = json_decode($event);
?>

<?php get_header(); ?>

<div class="container main-container">
  <?php the_breadcrumbs(); ?>

  <h1 class="brochure-heading" style="background-image: url(<?php echo image_uri('chisels-in-row.jpg'); ?>);"><?php echo $brochureCategory->name; ?></h1>

  <div class="row">
    <div class="col-md-3 left-nav">
      <ul class="nav flex-column">
      </ul>
    </div>

    <div class="col-md-9">
      <h2><?php echo $event->name->html; ?></h2>

      <!-- <p><em>
        <?php echo date('F j, Y', strtotime($event->start->local)); ?> from
        <?php echo date('g:i A', strtotime($event->start->local)); ?> to
        <?php echo date('g:i A', strtotime($event->end->local)); ?>
      </em></p> -->

      <p><em><strong>Instructor:</strong> <a href="<?php echo $event->organizer->url; ?>"><?php echo $event->organizer->name; ?></a></em></p>

      <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-xl-8">
            <?php
              if ($event->logo) {
                $logoUrl = $event->logo->url;
              } else {
                $logoUrl = image_uri('eventbrite-placeholder.jpg');
              }
            ?>
            <img src="<?php echo $logoUrl; ?>" class="card-img" alt="">
          </div>
          <div class="col-xl-4">
            <div class="card-body">
              <h5 class="card-title"><?php echo date('F j, Y', strtotime($event->start->local)); ?></h5>
              <p class="card-text">
                <strong>Starts:</strong> <?php echo date('g:i A', strtotime($event->start->local)); ?><br>
                <strong>Ends:</strong> <?php echo date('g:i A', strtotime($event->end->local)); ?>
              </p>

              <p><a class="btn btn-primary" href="<?php echo $event->url; ?>">View on Eventbrite</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="eventbrite-description">
        <?php echo $event->description->html; ?>
      </div>
    </div>
  </div> <!-- row -->
</div> <!-- container -->
<?php get_footer(); ?>
