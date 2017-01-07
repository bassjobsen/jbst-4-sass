    <form class="form-inline my-2 my-lg-0 search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input class="form-control mr-sm-2" type="text" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'search', 'jbst-4' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'search', 'jbst-4' ) ?>">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
