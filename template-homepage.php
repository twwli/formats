<?php
/*
 Template Name: Homepage
*/
?>

<?php get_header(); ?>

<main class="cards-wrapper">
    <?php
    // Vérifier si l'utilisateur est sur un appareil mobile
    $is_mobile = wp_is_mobile();

    // Définir les arguments de la requête
    $args = array(
        'post_type'      => 'custom_card',
        'posts_per_page' => -1,
        'no_found_rows'  => true, // Pas de pagination nécessaire, cela accélère la requête
    );

    // Si c'est un mobile, ajouter 'orderby' => 'rand' pour un ordre aléatoire
    if ( $is_mobile ) {
        $args['orderby'] = 'rand';
    }

    $wp_query = new WP_Query($args);

    if ( $wp_query->have_posts() ) :
        while ( $wp_query->have_posts() ) : $wp_query->the_post();  

        // Récupérer la valeur du champ select 'carte_type'
        $carte_type = get_field('carte_type');

        // Vérifier la valeur sélectionnée et charger le template correspondant
        if ($carte_type == 'image') {
            get_template_part('includes/card', 'image');
        } elseif ($carte_type == 'video') {
            get_template_part('includes/card', 'video');
        }

        endwhile; 
        rewind_posts(); 
        wp_reset_query(); 
    endif; 
    ?>

    <?php if ( ! $is_mobile ) : get_template_part('/includes/iframes'); endif; ?>
</main>

<?php get_template_part('/includes/filter'); ?>
<?php get_footer(); ?>