<nav class="navbar navbar-light bg-faded navbar-full" role="navigation">
  <button class="navbar-toggler hidden-md-up pull-xs-right" type="button" data-toggle="collapse" data-target="#CollapsingNavbar">
    &#9776;
  </button>
  <div class="nav navbar-nav navbar-toggleable-sm collapse" id="CollapsingNavbar">
    <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
    <?php jbst4_top_nav(); ?>
  <form class="form-inline pull-md-right search-form" action="<?php echo home_url( '/' ); ?>">
    <input class="form-control" type="text" placeholder="<?php echo esc_attr_x( 'Search', 'search', 'jbst-4' ) ?>">
    <button class="btn btn-primary-outline" type="button"><?php echo esc_attr_x( 'Search', 'search' ,'jbst-4' ) ?></button>
  </form>
  </div>
</nav>
