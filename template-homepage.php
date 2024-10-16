<?php
/*
 Template Name: Homepage
*/
?>

<?php get_header(); ?>

<main class="cards-wrapper">

    <?php
    $args = array(
        'post_type' => 'custom_card',
        'posts_per_page' => -9999,
        'no_found_rows'  => true, // We don't need pagination, this speeds up the query
    );
      
    $wp_query = new WP_Query($args);

    if ( $wp_query->have_posts() ) :
    while ( $wp_query->have_posts() ) : $wp_query->the_post();  ?> 

    <?php
    // Récupérer la valeur du champ select 'carte_type'
    $carte_type = get_field('carte_type');

    // Vérifier la valeur sélectionnée et charger le template correspondant
    if ($carte_type == 'image') {
        get_template_part('includes/card', 'image');
    } elseif ($carte_type == 'video') {
        get_template_part('includes/card', 'video');
    }
    ?>
        
    <?php endwhile; rewind_posts(); wp_reset_query(); endif; ?>

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
                <button class="close-details" data-target="details2">Close</button>
                <iframe
                    id="inlineFrameExample"
                    title="Inline Frame Example"
                    width="1280"
                    height="2000"
                    src="<?php the_sub_field('url_iframe'); ?>">
                </iframe>
            </div>
        </div>
        <?php endwhile; ?> 
	<?php } ?>
    <?php endwhile; rewind_posts(); wp_reset_query(); endif; ?>

    <div id="filter-menu">
    <button data-filter="design">Design</button>
    <button data-filter="emilie">Émilie</button>
    <button data-filter="atelier">Atelier</button>
    <button data-filter="all">Tous</button>
    </div>

    <style>
        .embed-container {
            position: fixed;
            top: 0;
            z-index: 9999;
        }

        .details-div {
            display: none; /* Masquer par défaut */
            background-color: #f0f0f0;
            padding: 20px;
            margin-top: 10px;
            border: 1px solid #ddd;
        }

        .details-div.active {
            display: block; /* Afficher lorsque la div est active */
        }
    </style>
</main>
<?php get_footer(); ?>