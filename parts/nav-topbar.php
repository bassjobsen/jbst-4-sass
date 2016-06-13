<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'jbst-4' ); ?></a>
<header itemscope itemtype="https://schema.org/WPHeader">
<nav class="navbar navbar-light bg-faded navbar-full" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
  <button class="navbar-toggler hidden-md-up pull-xs-right" type="button" data-toggle="collapse" data-target="#CollapsingNavbar">
    &#9776;
  </button>
  <div class="navbar-toggleable-sm collapse" id="CollapsingNavbar">
    <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><span itemprop="name"><?php esc_html( bloginfo('name') ); ?></span></a>
    <?php jbst4_top_nav(); ?>
    <?php get_search_form(); ?> 
  </div>
</nav>
</header>
