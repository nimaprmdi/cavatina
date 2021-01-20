<?php
/**
 * The template for displaying single project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_cavatina
 */

get_header();
?>
<!-- Aside -->
<aside class="o-page__col c-aside c-aside--mobile-hide js-aside">
    <div class="c-aside__content">
        <div class="c-aside__wrapper">
            <div class="c-aside__context">
                <span class="c-aside__title">Project</span>
            </div>
        </div>

    </div>
</aside>

<!-- Main content-->
<main class="o-page__main o-page__main--no-bottom-space js-page__main">
    <div class="o-page__col c-content">
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'c-single' ); ?>>

            <!--data-simplebar data-simplebar-auto-hide="false"-->

            <div class="c-single__content">

                <?php
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cavatina' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    ),
                    "test"
                );
                ?>

            </div>


        </article><!-- #post-<?php the_ID(); ?> -->
        <!--Single-->
    </div>
    <?php get_footer();?>
</main><!-- #main -->
