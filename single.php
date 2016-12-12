<?php

get_header();
get_template_part('nav');

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?the_title()?>
    <?the_content()?>

<?php endwhile; else : ?>
    <p><?php _e( 'Keine passenden Inhalte gefunden.' ); ?></p>
<?php endif; ?>
<?php
get_template_part('footer');
?>