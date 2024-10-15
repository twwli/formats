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

        <div id="" class="">


        </div>
        
    <?php endwhile; rewind_posts(); wp_reset_query(); endif; ?>
</main>
<?php get_footer(); ?>