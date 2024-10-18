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
                <svg viewBox="0 0 44.5 44.5" xmlns="http://www.w3.org/2000/svg"><g fill="none" stroke="#000" stroke-miterlimit="10"><path d="m.4.4 43.7 43.7"/><path d="m.4 44.1 43.7-43.7"/></g></svg>
                </button>
                <iframe
                    loading="lazy" 
                    id="project-iframe"
                    width="1280"
                    height="720"
                    src="<?php the_sub_field('url_iframe'); ?>">
                </iframe>
            </div>
        </div>
        <?php endwhile; ?> 
	<?php } ?>
<?php endwhile; rewind_posts(); wp_reset_query(); endif; ?>