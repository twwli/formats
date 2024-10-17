<div id="preloader">
	<div id="lottie-animation"></div>
</div>

<style>
	#preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: white;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

body.loading #preloader {
  display: flex;
}

body.loaded #preloader {
  display: none;
}

</style>

<!-- <script>
  document.addEventListener('DOMContentLoaded', function () {
    if (!localStorage.getItem('preloaderShown')) {
      var animation = lottie.loadAnimation({
        container: document.getElementById('lottie-animation'),
        renderer: 'svg',
        loop: false,
        autoplay: true,
        path: '<?php echo get_template_directory_uri(); ?>/library/animation.json'
      });

      document.body.classList.add('loading');

      animation.addEventListener('complete', function () {
        document.body.classList.remove('loading');
        document.body.classList.add('loaded');
        localStorage.setItem('preloaderShown', 'true');
      });

      window.addEventListener('load', function () {
        setTimeout(function () {
          document.body.classList.remove('loading');
          document.body.classList.add('loaded');
        }, 2000);
      });
    } else {
      document.body.classList.add('loaded');
    }
  });
</script> -->

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var animation = lottie.loadAnimation({
      container: document.getElementById('lottie-animation'),
      renderer: 'svg',
      loop: false,
      autoplay: true,
      path: '<?php echo get_template_directory_uri(); ?>/library/animation.json'
    });

    document.body.classList.add('loading');

    animation.addEventListener('complete', function () {
      document.body.classList.remove('loading');
      document.body.classList.add('loaded');
    });

    window.addEventListener('load', function () {
      setTimeout(function () {
        document.body.classList.remove('loading');
        document.body.classList.add('loaded');
      }, 2000);
    });
  });
</script>




