			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div id="copyright" class="wrap cf">
					<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
				</div>
			</footer>
		<?php include (TEMPLATEPATH . '/includes/preloader.php'); ?>
		<?php // include (TEMPLATEPATH . '/includes/mobile-nav.php'); ?>
		
    <?php // End Page transitions ?>
    <script>
      document.addEventListener("DOMContentLoaded", function(e) {
        document.body.classList.remove('fade');
      });
    </script>
		<?php // all js scripts are loaded in library/formats.php ?>
		<?php wp_footer(); ?>
		<script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZyxPjiipYXnSU0ygqeac2q7CVYMbh84q0uHVRRxEtvFPiQYbXWUorga2aqZJ0z"></script>
	</body>

</html> <!-- end of site. what a ride! -->