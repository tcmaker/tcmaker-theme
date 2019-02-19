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
    <div class="row">
      <!-- begin blog post -->
      <div class="col-lg-6">
        <div class="card flex-md-row blog-preview">
          <div class="card-body d-flex align-items-start">
            <div class="card-text">
              <h3><a href="/blog/post">Grilling! With food! Wednesday night!</a></h3>
              <p class="byline">
                by Bob Poate, October 8th, 2018
              </p>
              <p>They said it couldn’t be done. They said we were foolish to try. But
                Grillchefmeister Michael is planning on doing what doubters said
                couldn’t, nay, shouldn’t be done! Grill outside in the lovely fall
                weather we’re currently experiencing. So come early, come often to the
                Open House Wednesday night, and experience the Thrill of the Grill when
                you can actually use some nice hot food.</p>

                <a href="/blog/post">Continue reading</a>
            </div>
          </div>
          <%= image_tag('chef-pot.png', class: 'card-img-right flex-none') -%>
        </div>
      </div>
      <!-- end -->

      <!-- begin blog post -->
      <div class="col-lg-6">
        <div class="card flex-md-row blog-preview">
          <div class="card-body flex-column">
            <div class="card-text">
              <h3><a href="/blog/post">Big Laser is Ready for Use</a></h3>
              <p class="byline">
                by Samuel L. Jackson, October 4th, 2018
              </p>
              <p>You think water moves fast? You should see ice. It moves like it
                has a mind. Like it knows it killed the world once and got a taste
                for murder. After the avalanche, it took us a week to climb out.
                Now, I don't know exactly when we turned on each other, but I
                know that seven of us survived the slide... and only five made it
                out. Now we took an oath, that I'm breaking now. We said we'd say
                it was the snow that killed the other two, but it wasn't. Nature
                is lethal but it doesn't hold a candle to man.</p>

                <a href="/blog/post">Continue reading</a>
            </div>
            <!-- <%= image_tag('chef-pot.png', class: 'card-img-right flex-auto') -%> -->
          </div>
        </div>
      </div>
      <!-- end -->
    </div>
  </div>
</div>
<?php get_footer(); ?>
