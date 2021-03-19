<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php wp_head(); ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/screen.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title><?php echo title_for_title_tag(); ?></title>
</head>
<body>
  <div class="container nav-container">
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
      <a class="navbar-brand" href="/">
        <img src="<?php echo image_uri('logo-red-text.svg'); ?>" class="d-inline-block align-top" alt="Twin Cities Maker">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <!-- <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li> -->

          <?php
            // What's the current page? If there's a 404, there won't be a
            // current page, but we still need to set current_page_id to
            // something.
            global $post;
            if ($post) {
              $current_page_id = $post->ID;
            } else {
              $current_page_id = -1;
            }

            $menu_items = array();

            $pages = wp_get_nav_menu_items('top-nav');
            foreach ($pages as $page) {
              $title = $page->title;
              $brochure_category = wp_get_post_terms($page->object_id, 'brochure_category');

              if ($brochure_category) {
                $title = array_shift($brochure_category)->name;
              }

              array_push($menu_items, array(
                'title'  => $title,
                'uri' => $page->url,
                'active' => $current_page_id == $page->object_id,
              ));
            }
          ?>

          <?php foreach ($menu_items as $item): ?>
            <?php if ($item['active']): ?>
                <li class="nav-item active">
                  <a class="nav-link"  href="<?php echo $item['uri']; ?>"><?php echo $item['title']; ?></a>
                </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $item['uri']; ?>"><?php echo $item['title']; ?></a>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>

          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> -->
        </ul>

        <!-- right dropdown -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Member Resources
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="https://clubhouse.tcmaker.org/">Member Dashboard</a>
              <a class="dropdown-item" href="https://wiki.tcmaker.org/">Wiki</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/wp-admin">WordPress Admin</a>
              <?php if (is_user_logged_in()): ?>
                <a class="dropdown-item" href="/wp-login.php?action=logout">Sign out of WordPress</a>
              <?php endif; ?>
            </div>
          </li>
        </ul> <!-- right dropdown -->
      </div>
    </nav>
  </div>
