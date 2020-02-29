<?php get_header(); ?>

<!-- HERO IMAGE -->
<!-- If we have a featured image display it -->
<div class="hero-container clearfix">
  <!-- 'SIGN' MENU -->
  <div class="hero-menu clearfix">
    <div class="title"><h1 class="outside hero-text">Carly</h1></div>
    <div class="sign sign-1"><a href="#media">Media</a></div>
    <div class="sign sign-2"><a href="#contact">Contact</a></div>
    <div class="sign sign-3"><a href=<?php echo tribe_get_events_link()?> target="_blank">Calendar</a></div>
  </div>
  <!-- HERO IMAGE -->
  <div class="hero-image clearfix">
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <h1 class="hero-text inside-text"> Ballerini </h1>
    <img src="<?php echo $image[0];?>" alt="Carly clenches fist"></img>
  </div>

</div>


<!-- THE BODY -->
<div class="the-body clearfix">
  <div class="welcome clearfix">
    <!-- WELCOME MESSAGE -->
    <h3 class="welcome-header"> Writer and Comedian </h3>
    <div class="welcome-message ">
      <?php while (have_posts()) : the_post(); ?>
      <p><?php the_content(); endwhile; ?></p>
    </div>
    <!-- UPCOMING SHOWS -->
    <!-- Get show posts -->
    <h3 class="events-title">Upcoming Events</h3>
    <div class="shows-splash clearfix">
      <div class="the-shows clearfix">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("events_area")) : ?>
        <?php endif;?>
      </div>
    </div>
  </div>

  <!-- THE WORK -->
  <div class="media-splash splash">
    <a name="media"></a>
    <div class="media  section clearfix">
      <!-- VIDEO GALLERY -->
      <h1> Media </h1>
      <div class=" videos clearfix">
        <?php $video = get_post(111)->post_content;
          echo do_shortcode($video);
        ?>
      </div>
      <!-- AUDIO REEL -->
      <div class=" audio clearfix">
        <h3> Commercial Audio Reel </h3>
        <?php $audio = get_post(83)->post_content;
          echo  do_shortcode($audio);
        ?>
      </div>
    </div>
  </div>

  <!-- CONTACT FORM -->
  <h1 class="contact-title"> Contact Carly </h1>
  <div class="contact-splash splash">
    <a name="contact"></a>
    <div class="section contact clearfix">
      <?php echo do_shortcode('[caldera_form id="CF5ae4d86eddc24"]'); ?>
    </div>
  </div>
  <footer class="footer clearfix" role="contentinfo">
    <a href='https://twitter.com/generalfunk?lang=en' ><img class="icon" src="<? echo get_template_directory_uri() . '/icons/facebook.svg'?>"></img></a>
    <a href='https://www.facebook.com/carly.simon.33' ><img class="icon" src="<? echo get_template_directory_uri() . '/icons/twitter.svg'?>"></img></a>
    <a href='https://www.instagram.com/ballca/' ><img class="icon" src="<? echo get_template_directory_uri() . '/icons/instagram.svg'?>"></img></a>
    <h4 class="copyright">Copyright © 2018 Jeremy Dixon. All rights reserved. Credit to FlatIcon for social media SVGs.</h4>
  </footer>
</div>

<?php get_footer(); ?>
