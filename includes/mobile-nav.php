<?php // Mobile Nav ?>

<div id="mobile-nav-wrapper"></div>
<div id="mobile-nav"> 
  <div id="mobile-nav-container">
    
    <?php wp_nav_menu(array(
     'container' => false,
     'container_class' => 'mobile-menu cf',               
     'menu' => __( 'The Main Menu', 'formats' ),  
     'menu_class' => 'top-nav cf',              
     'theme_location' => 'main-nav',                 
     'before' => '',                                
     'after' => '',                                
     'link_before' => '',                           
     'link_after' => '',                            
     'depth' => 0,                                
     'fallback_cb' => ''                           
    )); ?>
    
  </div>
</div> 