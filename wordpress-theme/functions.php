<?php

add_action('init', function() {
  register_taxonomy('brochure_category', 'page', array(
    'label' => 'Brochure Category',
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'meta_box_cb' => 'post_categories_meta_box',
  ));
});

register_nav_menu('top-nav', 'Top Nav');

function title_for_title_tag() {
  if (is_front_page()) {
    return 'Twin Cities Maker';
  }

  return get_the_title() . ' :: Twin Cities Maker';
}

function image_uri($img) {
  return get_template_directory_uri() . '/assets/img/' . $img;
}

function title_or_brochure_catagory($page) {
  if ($page->post_parent) {
    return get_the_title($page->ID);
  }

  // Show the brochure catagory instead
  $categories = wp_get_post_terms($post->ID, 'brochure_category');
  if ($categories) {
    $brochure_catagory = array_shift($catagories);
    return $brochure_catagory->name;
  }

  // It's not in a brochure catagory, so just return the title
  return get_the_title($page->ID);

}

function the_breadcrumbs() {
  global $post;
  $breadcrumbs = array();

  // Don't show breadcrumbs on front page, even if this function is called.
  if (is_front_page()) {
    return;
  }

  if (is_home()) {
    array_push($breadcrumbs, array(
      'uri' => '/blog',
      'title' => 'Blog',
    ));
    return render_breadcrumbs($breadcrumbs);
  }

  if (is_page()) {
    array_push($breadcrumbs, array(
      'uri' => get_the_permalink(),
      'title' => get_the_title(),
    ));

    $page = $post;
    while ($page->post_parent) {
      $page = get_page($page->post_parent);

      array_unshift($breadcrumbs, array(
        'uri' => get_permalink($page->ID),
        'title' => get_the_title($page->ID),
      ));
    }
    return render_breadcrumbs($breadcrumbs);
  }

  if (is_single()) {
    $cat = get_the_category();
    $cat = array_shift($cat);

    while (! $cat instanceof WP_Error) {
      array_unshift($breadcrumbs, array(
        'uri' => get_category_link($cat->term_id),
        'title' => $cat->name,
      ));
      $cat = get_category($cat->category_parent);
    }

    array_unshift($breadcrumbs, array(
      'uri' => '/blog',
      'title' => 'Blog',
    ));

    return render_breadcrumbs($breadcrumbs);
  }
}

function render_breadcrumbs($breadcrumbs) {
  // We'll always have at least one breadcrumb:
  array_unshift($breadcrumbs, array(
    'uri' => '/',
    'title' => 'Home',
  ));

  // The last breadcrumb item is special.
  $activeBreadcrumb = array_pop($breadcrumbs);

  // Loop over breadcrumb array, displaying breadcrumbs
  echo '<nav aria-label="breadcrumb">';
  echo '<ol class="breadcrumb">';
  // Display inactive breadcrumbs
  foreach ($breadcrumbs as $breadcrumb) {
    echo '<li class="breadcrumb-item">';
    echo '<a href="' . $breadcrumb['uri'] . '">' . $breadcrumb['title'] . '</a>';
    echo "</li>";
  }
  echo '<li class="breadcrumb-item active" aria-current="page">' . $activeBreadcrumb['title'] . '</li>';
  echo '</ol>';
  echo '</nav>';
}
