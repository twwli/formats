<?php
    $args = array(
        'post_type' => 'custom_card',
        'posts_per_page' => -9999,
        'no_found_rows'  => true, // We don't need pagination, this speeds up the query
    );
      
    $wp_query = new WP_Query($args);

    if ( $wp_query->have_posts() ) :
    while ( $wp_query->have_posts() ) : $wp_query->the_post();  ?> 
    <?php $value = get_field('extended_view');
    if( $value ) { ?>
    <?php while( have_rows('extended_view') ): the_row(); ?>
        <div id="details<?php echo get_the_ID(); ?>" class="details-div extended-view" style="display: none;">
            <div class="embed-container">
                <button class="close-details" data-target="details<?php echo get_the_ID(); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                </button>
                <iframe
                    id="project-iframe"
                    width="1280"
                    height="750"
                    src="<?php the_sub_field('url_iframe'); ?>">
                </iframe>
            </div>
        </div>
        <?php endwhile; ?> 
	<?php } ?>
<?php endwhile; rewind_posts(); wp_reset_query(); endif; ?>