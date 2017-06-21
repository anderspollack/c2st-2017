<form action="/" method="get">
    <!--<label for="search"><span class="glyphicon glyphicon-search"></span></label>-->
    <input type="text" class="form-control search-field" name="s" id="search" placeholder="Search C2ST.org" value="<?php the_search_query(); ?>" />
    <input type="submit" class="form-control search-submit" value="Search" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
</form>