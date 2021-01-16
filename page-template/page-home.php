<?php /* Template Name: Home */ ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> onload="mainPageCarousels()">

    <?php wp_body_open(); ?>
    <header id="masthead" class="c-header c-header--home js-header">
        <div class="c-header__holder js-nav">
            <div class="c-header__logo js-logo">
                <img class="c-header__logo__image"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="logo" />
                <!-- <h1>Cavatina</h1> -->
                <p class="c-header__text ">digital creativity</p>
            </div>
            <button class="c-header__menu" aria-controls="primary-menu" aria-expanded="false" onClick="blurToggle()">
            </button>
            <div class="c-header__search js-header__search"></div>
            <?php
            if ( has_nav_menu( 'menu-1' ) ) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu-registered',
                        "menu_class" => "s-nav",
                        "container_class" => "c-nav js-navigation",
                        "container" => "nav",
                    )
                );
            }

            ?>
        </div>
    </header>
    <div class="c-search__overlay js-search__overlay">
        <?php get_search_form(); ?>
    </div>
    <div class="o-overlay js-overlay"></div>

    <div id="page" class="o-page o-page--home js-page">
        <aside class="o-page__col c-aside c-aside--home">
            <div class="c-aside__content">
                <div class="c-aside__nav">
                    <p class="c-aside__nav-title">Navigation</p>
                    <?php
                        if ( has_nav_menu( 'menu-1' ) ) {
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu-registered',
                                    "menu_class" => "s-nav", // nesting
                                    "container_class" => "c-nav",
                                    "container" => "nav",
                                )
                            );
                        }
                        else{
                        }
                        ?>
                </div>
                <?php
                $loop = new WP_Query( array(
                        'post_type' => 'projects',
                        'posts_per_page' => 5
                ));
                ?>
                <div class="c-aside__carousel">
                    <div class="c-carousel c-carousel--aside">
                        <p class="c-carousel__title">Recent Projects</p>
                        <div class="c-carousel__post-titles js-carousel__post-titles">
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" class="c-carousel__post-title"><span class="o-bullet-numeric"></span><p class="c-carousel__post-title__text js-carousel__post-title__text">', '</p></a>' ); ?>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                    <a href="/projects" class="c-carousel__more">View All Projects</a>
                </div>
            </div>
        </aside>
        <main class="o-page__main js-page__main o-page__main--home">
            <div class="o-page__col c-content c-content--home">
                <div class="c-carousel">
                    <p class="c-carousel__title c-carousel__title--home">Recent Projects</p>
                    <div class="c-carousel__slider">
                        <div class="c-carousel__context js-carousel__context">
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="c-carousel__cell">
                                <a href="<?php echo get_permalink() ?>">
                                    <?php the_post_thumbnail('large', array('class' => 'c-carousel__image')); ?>
                                </a>
                            </div>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                    <div
                        class="c-carousel__post-titles js-carousel__post-titles c-carousel__post-titles--mobile js-carousel__post-titles--mobile">
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" class="c-carousel__post-title"><span class="o-bullet-numeric"></span><p class="c-carousel__post-title__text js-carousel__post-title__text-mobile">', '</p></a>' ); ?>
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                    <a href="/projects" class="c-carousel__more c-carousel__more--home">View All Projects</a>
                </div>
            </div>
        </main>
        <!-- #masthead -->
        <?php get_footer(); ?>
    </div>