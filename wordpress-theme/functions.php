<?php

add_action( 'init', function() {
  // register_taxonomy_for_object_type('brochure_category', 'page', array(
  //   'show_ui' => true,
  // ));

  register_taxonomy('brochure_category', 'page', array(
    'label' => 'Brochure Category',
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'meta_box_cb' => 'post_categories_meta_box',
  ));

});

//brochure_sections_taxonomy();


function image_uri($img) {
  return get_template_directory_uri() . '/assets/img/' . $img;
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
  foreach($breadcrumbs as $breadcrumb) {
    echo '<li class="breadcrumb-item">';
    echo '<a href="' . $breadcrumb['uri'] . '">' . $breadcrumb['title'] . '</a>';
    echo "</li>";
  }
  echo '<li class="breadcrumb-item active" aria-current="page">' . $activeBreadcrumb['title'] . '</li>';
  echo '</ol>';
  echo '</nav>';
}

function the_broken_breadcrumbs()
{
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&raquo;'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
        }
    } else {
        echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</div>';
    }
} // end the_breadcrumb()
