<?php
function jbst4_toggle_button() {
?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
<?php
}    
?>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'jbst-4' ); ?></a>
<header itemscope itemtype="https://schema.org/WPHeader">
<?php
if (has_custom_logo()) {
?>    
  <div class="container logo">
  
  <?php
  jbst4_toggle_button();
  the_custom_logo();
  ?>
  </div> 
<?php
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><span itemprop="name"><?php esc_html( bloginfo('name') ); ?></span></a>
  <?php
  if (!has_custom_logo()) {
    jbst4_toggle_button();  
  }
  ?>  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php jbst4_top_nav(); ?>
    <?php get_search_form(); ?> 
  </div>
</nav>

</header>
