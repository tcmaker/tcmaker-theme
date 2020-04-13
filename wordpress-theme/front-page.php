<?php
  $client = new TCMaker\Calendar\Eventbrite();
  $events = $client->getUpcomingClasses();
  $events = array_slice($events, 0, 4);
  $calendarEvents = new TCMaker\Calendar\UpcomingEvents();

  $getCalendarUri = function($event) {
    $dt = $event->getStart()->getDateTime();
    $year = date('Y', strtotime($dt));
    $month = date('m', strtotime($dt));

    return "/calendar/?cal-year=$year&cal-month=$month";
  };
?>
<?php get_header(); ?>
<div class="container main-container">
  <div class="jumbotron jumbotron-main mb-5">
    <h1 class="display-4">Find Your Creativity</h1>
    <p class="lead">
      Twin Cities Maker is a non-profit, volunteer-driven community of artists, engineers, and
      makers. Together, we operate a shared community workshop
      where you can build nearly anything you can imagine.
    </p>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="/about-us" role="button">Learn More</a>
  </div>

  <div class="row mb-4">
    <div class="col-md-8 mb-4">
      <h2>A Makerspace for Makers of All Kinds</h2>
      <div class="card bg-light">
        <div class="row no-gutters h-100"> <!-- h-100 fixes an IE 11 flex issue -->
          <div class="col-md-5">
            <img src="<?php echo image_uri('clamped-fingerboard.jpg'); ?>" class="card-img" alt="">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <p class="card-text">
                Whether you're into woodworking, metalworking, or high-precision machining,
                we've got the tools, space, and equipment to help your projects come together.
                All of our members have 24/7 access to our workshop.
              </p>

              <a class="btn btn-primary" href="/our-workshop">Learn More About Our Shop</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <h2>Upcoming Classes</h2>
      <div class="list-group list-group-flush front-page-class-listing">
        <?php foreach ($events as $event): ?>
          <a href="/classes/class?event_id=<?php echo $event->id; ?>" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1 text-dark"><?php echo $event->name->html; ?></h5>
            </div>
            <small><strong><em><?php echo date('F j, Y \a\t g:i A', strtotime($event->start->local)); ?></em></strong></small>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div> <!-- row -->

  <!-- BEGIN COVID-19 MESSAGE -->
  <div class="row mb-4">
    <div class="col-md-12">
      <div class="card bg-primary text-white">
        <!-- <div class="card-header">
        </div> -->
        <div class="row no-gutters h-100"> <!-- h-100 fixes an IE 11 flex issue -->
          <div class="col-lg-3 d-none d-lg-block">
            <img src="<?php echo image_uri('3d-printer-square.jpg'); ?>" class="card-img" alt="">
          </div>

          <div class="col-lg-9">
            <div class="card-body text-sans-serif">
              <h5 class="card-title">Help Fight COVID-19</h5>
              <p class="card-text">
                Twin Cities Maker is doing our part to supply the medical professionals in our
                community with the personal protective equipment they need to stay safe. We have been
                hard at work getting as many 3D printers online as possible, and we need your help!
              </p>

              <a class="btn btn-light" href="/covid-19-ppe/">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END COVID-19 MESSAGE -->

  <div class="row">
    <div class="col-md-8">
      <h2>News and Announcements</h2>
      <?php query_posts('posts_per_page=2'); ?>
      <div class="list-group list-group-flush">
        <?php while ( have_posts() ) : the_post(); ?>
          <!-- start -->
            <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="text-dark mb-1"><?php the_title(); ?></h5>
                <small><strong><em><?php the_time('F j, Y'); ?></em></strong></small>
              </div>
              <div class="mb-1"><?php the_excerpt(); ?></div>
              <small>by <?php the_author(); ?></small>
            </a>
          <!-- end -->
        <?php endwhile; ?>
      </div> <!-- list-group -->
    </div> <!-- col -->
    <div class="col-md-4">
      <h2>Upcoming Events</h2>
      <div class="list-group list-group-flush front-page-class-listing">
        <?php foreach ($calendarEvents->getEvents(4) as $event): ?>
          <a href="<?php echo $getCalendarUri($event); ?>" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="display-5 mb-1 text-dark"><?php echo $event->getSummary(); ?></h5>
            </div>
            <small><strong><em><?php echo date('F j, Y \a\t g:i A', strtotime($event->getStart()->getDateTime())); ?></em></strong></small>
          </a>
        <?php endforeach; ?>
      </div>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->
<?php get_footer(); ?>
