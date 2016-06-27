<form method="get" id="searchform" action="<?php bloginfo('home'); ?>">
<div class="wrapper">
        <div class="search">
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Search your Query" >
                        <input name="search" type="submit" value="">

        </div>
     </div>    
</form>
