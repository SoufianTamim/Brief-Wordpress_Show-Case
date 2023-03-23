<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bike Rental Shop
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="container site-main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.','bike-rental-shop' ); ?></h2>
            </header>
            <div class="page-content pb-4">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?','bike-rental-shop' ); ?></p>
				<?php get_search_form(); ?>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>