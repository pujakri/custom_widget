<?php if (   is_active_sidebar( 'Sample Widget'  )
) :  ?>
	<div class="first quarter left widget-area">
        <?php dynamic_sidebar( 'Sample Widget' ); ?>
    </div><!-- .first .widget-area -->
<?php
	endif;
?>