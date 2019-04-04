<?php use \TCMaker\Calendar; ?>
<?php get_header(); ?>

<?php
  $categories = wp_get_post_terms($post->ID, 'brochure_category');
  $brochureCategory = array_shift($categories);
  $menuItems = array();

  // Get the root page of the category
  $rootPage = $post;
  while ($rootPage->post_parent) {
    $rootPage = get_page($rootPage->post_parent);
  }
  array_push($menuItems, $rootPage);

  // Add child pages, if any exist
  $children = get_children(array(
    'post_parent' => $rootPage->ID,
    'post_type' => 'page',
    'post_status' => 'publish'
  ));

  $menuItems = $children;
  array_unshift($menuItems, $rootPage);
?>

<div class="container main-container">
  <?php the_breadcrumbs(); ?>

  <h1 class="brochure-heading" style="background-image: url(<?php echo image_uri('chisels-in-row.jpg'); ?>);"><?php echo $brochureCategory->name; ?></h1>

  <div class="row">
    <?php /* <div class="col-md-3 left-nav">
      <ul class="nav flex-column">
        <?php foreach ($menuItems as $item): ?>
          <?php if ($post->ID == $item->ID): ?>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo get_permalink($item); ?>"><?php echo apply_filters('the_title', $item->post_title); ?></a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo get_permalink($item); ?>"><?php echo apply_filters('the_title', $item->post_title); ?></a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div> */ ?>

    <div class="col-sm-12">
      <h2>General Calendar</h2>
      <?php if (true || class_exists('TCMaker\Calendar\MonthCalendar')): ?>
        <?php
          $params = new TCMaker\Calendar\ParameterExtractor($_GET);
          $cal = new TCMaker\Calendar\MonthCalendar($params->year, $params->month);
          $weeks = $cal->getEventsByWeek();
        ?>

        <h4 class="display-4 mb-4 text-center"><?php echo $cal->getMonthAndYearInEnglish() ?></h4>
          <div class="row d-none d-sm-flex p-1 bg-dark text-white calendar-heading">
            <h5 class="col-sm p-1 text-center">Sun</h5>
            <h5 class="col-sm p-1 text-center">Mon</h5>
            <h5 class="col-sm p-1 text-center">Tue</h5>
            <h5 class="col-sm p-1 text-center">Wed</h5>
            <h5 class="col-sm p-1 text-center">Thu</h5>
            <h5 class="col-sm p-1 text-center">Fri</h5>
            <h5 class="col-sm p-1 text-center">Sat</h5>
          </div> <!-- row header -->

          <?php foreach ($weeks as $week): ?>
            <div class="row border border-right-0 border-bottom-0">
              <?php foreach ($week as $day): ?>
                <!-- process each day -->
                <?php
                  if ($day->isFiller()) {
                    $cellClasses = "day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted";
                  } else {
                    $cellClasses = "day col-sm p-2 border border-left-0 border-top-0 text-truncate";
                  }
                ?>

                <div class="<?php echo $cellClasses; ?>">
                  <h5 class="row align-items-center">
                    <span class="date col-1"><?php echo $day->getDay(); ?></span>
                    <small class="col d-sm-none text-center text-muted"><?php echo $day->getDayOfWeek(); ?></small>
                  </h5>

                  <?php if (count($day->getEvents()) > 0): ?>
                    <?php foreach ($day->getEvents() as $event): ?>
                      <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-info text-white" data-toggle="modal" data-target="#event-<?php echo $event->getId(); ?>">
                        <?php echo $event->getSummary(); ?>
                      </a>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <p class="d-sm-none">No events</p>
                  <?php endif; ?>

                </div> <!-- cell -->
              <?php endforeach; ?>
            </div> <!-- week -->
          <?php endforeach; ?>

          <?php foreach ($cal->getEvents() as $event): ?>
            <div class="modal fade" id="event-<?php echo $event->getId(); ?>" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $event->getSummary(); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php if ($event->getDescription()): ?>
                      <p><?php echo make_clickable($event->getDescription()); ?></p>
                    <?php endif; ?>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-6">
                          <p><strong>Starts:</strong> <?php echo (new DateTime($event->getStart()->getDateTime()))->format("g:i A"); ?><br />
                          <strong>Ends:</strong> <?php echo (new DateTime($event->getEnd()->getDateTime()))->format("g:i A"); ?></p>
                        </div>
                        <div class="col-sm-6">
                          <a href="<?php echo $event->getHtmlLink(); ?>" class="btn btn-primary btn-sm text-white">View on Google Calendar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>


      <?php else: ?>
        <p>Someone didn't install their WordPress plugins correctly.</p>
      <?php endif; ?>
    </div>
  </div> <!-- row -->
</div> <!-- container -->
<?php get_footer(); ?>
