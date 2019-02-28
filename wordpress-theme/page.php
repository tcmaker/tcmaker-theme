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
    <div class="col-md-3 left-nav">
      <ul class="nav flex-column">
        <?php foreach($menuItems as $item): ?>
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
    </div>

    <div class="col-md-9">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : ?>
          <?php the_post(); ?>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
