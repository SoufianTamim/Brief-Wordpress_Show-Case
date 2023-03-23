<?php
/**
 * Template part for displaying posts
 *
 * @package Automobile Hub
 * @subpackage automobile_hub
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2><?php the_title();?></h2>
    <div class="box-info">
        <?php if(get_theme_mod('automobile_hub_remove_date',true) != ''){ ?>
            <i class="far fa-calendar-alt"></i><span class="entry-date"><?php the_date(); ?></span>
        <?php }?>
        <?php if(get_theme_mod('automobile_hub_remove_author',true) != ''){ ?>
            <i class="fas fa-user"></i><span class="entry-author"><?php the_author(); ?></span>
        <?php }?>
        <?php if(get_theme_mod('automobile_hub_remove_comments',true) != ''){ ?>
            <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','automobile-hub'), __('0 Comments','automobile-hub'), __('% Comments','automobile-hub') ); ?></span>
        <?php }?>
    </div>
    <hr>
    <?php if(has_post_thumbnail()) { ?>
        <div class="box-image mb-3">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php }?>
    <div class="box-content">
        <?php the_content(); ?>
        <?php if(get_theme_mod('automobile_hub_remove_tags',true) != ''){ ?>
            <?php the_tags(); ?>
        <?php }?>
        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'automobile-hub' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next:', 'automobile-hub' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous:', 'automobile-hub' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
    </div>
</article>