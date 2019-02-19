<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php wp_head(); ?>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/screen.css">

  <title>Twin Cities Maker</title>
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
          <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="/membership">Membership</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Classes</a></li>
          <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="/events">Calendar</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Wiki</a></li>

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

        <!-- <% if current_member %>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <%= current_member.full_name %>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="#">Dashboard</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Sign Out</a>
              </div>
            </li>
          </ul>
        <% else %>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><%= link_to 'Member Dashboard', '/dashboard', class: 'nav-link' %></li>
          </ul>
        <% end %> -->
      </div>
    </nav>








  </div>
