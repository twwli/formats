<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php the_content(); ?>
              
              <img class="lazyload"
                 src="<?php the_post_thumbnail_url( 'formats-thumb-315' ); ?>"
                 data-src="<?php the_post_thumbnail_url( 'formats-thumb-630' ); ?>"
                 data-srcset="<?php the_post_thumbnail_url( 'formats-thumb-630' ); ?> 1x, <?php the_post_thumbnail_url( 'formats-thumb-1260' ); ?> 2x"
                 width="630" height="420" />

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'formats' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'formats' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'formats' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</main>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
