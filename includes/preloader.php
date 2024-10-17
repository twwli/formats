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
    transition: opacity 1s ease-in; /* Transition pour l'effet de fondu */
    opacity: 1;
  }

  body.loading #preloader {
    opacity: 1;
  }

  body.loaded #preloader {
    opacity: 0; /* Commence à disparaître */
    pointer-events: none; /* Désactiver les interactions */
    transition: opacity 1s ease-in; /* Transition pour l'effet de fondu */
  }

  body.loaded {
    transition: opacity 1s ease-in;
    opacity: 1; /* Le site devient visible avec une transition */
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




