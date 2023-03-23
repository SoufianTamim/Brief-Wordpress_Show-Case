<?php
/**
 * The front page template file
 *
 * @package Auto Car Care
 * @subpackage auto_car_care
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php get_template_part( 'template-parts/home/slider' ); ?>
    <?php get_template_part( 'template-parts/home/contact-form' ); ?>
	<?php get_template_part( 'template-parts/home/about' ); ?>
	<?php get_template_part( 'template-parts/home/home-content' ); ?>
</main>

<?php get_footer();