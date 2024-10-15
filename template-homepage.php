<?php
/*
 Template Name: Homepage
*/
?>

<?php get_header(); ?>

<main class="cards-wrapper">
  <!-- Exemple pour plusieurs cartes -->
  <div class="card-container" data-id="card1" style="position: absolute; transform: rotate(-8deg)">
    <div class="card-content" style="width: 200px; height: 262px;">
      <div class="card-front">
        <img src="<?php echo get_template_directory_uri(); ?>/library/images/test.webp" />
        <button data-action="flip-to-back">see back</button>
      </div>
      <div class="card-back">
        back face 1
        <button data-action="flip-to-front">see front</button>
      </div>
    </div>
  </div>

  <!-- Ajoute les autres cartes ici -->
  <div class="card-container" data-id="card2" style="position: absolute;">
    <div class="card-content">
      <div class="card-front">
        front face 2
        <button data-action="flip-to-back">see back</button>
      </div>
      <div class="card-back">
        back face 2
        <button data-action="flip-to-front">see front</button>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>