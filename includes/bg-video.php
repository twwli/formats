<video id="my-video" class="bg-video lazy" muted loop data-src="<?php echo get_template_directory_uri(); ?>/library/video/podojo.mp4" poster="">
    <source src="<?php echo get_template_directory_uri(); ?>/library/video/podojo.mp4" type="video/mp4">
    <source src="<?php echo get_template_directory_uri(); ?>/library/video/podojo.ogv" type="video/ogg">
    <source src="<?php echo get_template_directory_uri(); ?>/library/video/podojo.webm" type="video/webm">
</video>

<script>
(function() {
  /**
   * Video element
   * @type {HTMLElement}
   */
  var video = document.getElementById("my-video");

  /**
   * Check if video can play, and play it
   */
  video.addEventListener( "canplay", function() {
    video.play();
  });
})();
</script>