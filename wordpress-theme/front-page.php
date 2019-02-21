<?php get_header(); ?>
<div class="container main-container">
  <div class="jumbotron jumbotron-main">
    <h1 class="display-4">Find Your Creativity</h1>
    <p class="lead">
      Twin Cities Maker is a non-profit, volunteer-driven community of artists, engineers, and
      makers. Together, we operate a shared community workshop
      where you can build nearly anything you can imagine.
    </p>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="/about-us" role="button">Learn More</a>
  </div>

  <div class="row mb-5">
    <div class="col-lg-4">
      <h3>Make</h3>

      <p>
        Whether you're into in woodworking, metalworking, or high-precision
        machining, we've got the tools, space, and equipment to help your projects
        come together. All of our members have 24-7 access to our workshop.
      </p>

      <p><a class="btn btn-primary" href="/our-workshop">More about our shop</a></p>
    </div>

    <div class="col-lg-4">
      <h3>Share</h3>

      <p>
        More than our workshop and our tools, it's our sense of community that
        makes us who and what we are. If your looking for others who share your
        enthusiasm for building things, fixing things, and figuring out how stuff
        works, you may have just found your people.
      </p>

      <p><a class="btn btn-primary" href="/about-us/community">Learn More</a></p>
    </div>

    <div class="col-lg-4">
      <h3>Learn</h3>

      <p>
        You weren't born knowing how to weld and operate laser cutters, and
        neither were we. We're always offering classes to teach these skills and
        many others.
      </p>

      <p><a class="btn btn-primary" href="/classes">Learn More</a></p>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <h2>From the Blog</h2>
    </div>
  </div>
    <div class="row">
      <?php query_posts('posts_per_page=2'); ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <!-- begin blog post -->
        <div class="col-lg-6">
          <div class="card flex-md-row blog-preview">
            <div class="card-body d-flex align-items-start">
              <div class="card-text">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="byline">
                  by <?php the_author(); ?>, <?php the_time('F j, Y'); ?>
                </p>
                <?php the_excerpt(); ?>

                  <a class="btn btn-primary" href="<?php the_permalink(); ?>">Continue reading</a>
              </div>
            </div>
            <!-- the_post_thumbnail() -->
          </div>
        </div>
        <!-- end -->
      <?php endwhile; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
