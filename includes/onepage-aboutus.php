<!-- About Us -->

<section id="about-us">
	<?php query_posts('showposts=1&post_type=about'); if (have_posts()) : ?> <?php while (have_posts()) : the_post(); ?>
    <div id="who-we-are" class="container clearfix">
	    <div class="half-one">
	        <h2><?php the_title(); ?></h2>
	    </div>
	    <div class="half-one"> <?php the_content(); ?></div>
    </div>

<!-- About Images -->

	<div id="what-is-flow" class="clearfix">
	    <div class="half-one">
	        <div class="square">
	        	<img src="<?php echo get_post_meta( $post->ID, "about-image-1", true ); ?>" alt="img-1.jpg" />
	        </div>
	    </div>
	    <div class="half-one">
	    	<div class="row"><img src="<?php echo get_post_meta( $post->ID, "about-image-2", true ); ?>" alt="img-2.jpg" />
	    	</div>
		    <div class="row">
		    	<div class="half-one square">
		    		<img src="<?php echo get_post_meta( $post->ID, "about-image-3", true ); ?>" alt="img-4.jpg" />
		    	</div>
		    	<div class="half-one square">
		    		<img src="<?php echo get_post_meta( $post->ID, "about-image-4", true ); ?>" alt="img-3.jpg" />
		    	</div>
		    </div>
	    </div>
	</div>

	<?php endwhile; ?>
	
	<?php else : ?>
		<article id="post-not-found" class="hentry clearfix" style="text-align: center;">
		   	<h1><?php _e( 'Oops, nothing found!' ); ?></h1>
		</article>
	<?php endif; ?>	
	
<!-- Inspiration -->

	<div id="inspiration">
		<div class="container clearfix">
			<?php query_posts('showposts=1&post_type=inspiration'); if (have_posts()) : ?> <?php while (have_posts()) : the_post(); ?>
		    <h3><?php the_title(); ?></h3>
		    <?php the_content(); ?>
		    <?php endwhile; ?>
		    <?php else : ?>
		    	<article id="post-not-found" class="hentry clearfix" style="text-align: center;">
		    	   	<h1><?php _e( 'Oops, nothing found!' ); ?></h1>
		    	</article>
		    <?php endif; ?>	
	    </div>	    
	</div>
</section>