<!-- Introduction -->

<section id="introduction">
	<div class="flow-wrapper clearfix">
		<h1>flow</h1>
		<span class="">/fləu/</span>
	</div>
	<div id="slider">
		<ul class="slides">
			<?php query_posts('showposts=-1&post_type=definitions'); if (have_posts()) : ?> <?php while (have_posts()) : the_post(); ?>
			<li>
				<div class="definition">
					<div class="definition-text">
						<span><?php the_title(); ?></span> <?php the_content(); ?>
					</div>
				</div>
			</li>
			<?php endwhile; ?>	    
		</ul>
    </div>
	<?php else : ?>
		<article id="post-not-found" class="hentry clearfix" style="text-align: center;">
		   	<h1><?php _e( 'Oops, No service found!' ); ?></h1>
		</article>
	<?php endif; ?>	
</section>