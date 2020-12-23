<?php /* Template Name: Home */ ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>


    <div id="page" class="o-page">

        <div class="u-header-space"></div>

        <header id="masthead" class="c-header c-header--home">

            <div class="c-header__holder c-header__holder--home js-nav">


                <div class="c-header__item c-header__logo c-header__logo--home">
                    <img class="o-image c-item__logo--home"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="logo" />
                </div>

                <p class="c-header__item c-header__desc c-header__desc--home">digital creativity</p>

                <button class="c-header__item c-header__item--menu-icon c-header__toggle--home"
                    aria-controls="primary-menu" aria-expanded="false">
                    <img class="o-image"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/hamburger-menu.svg"
                        alt="hamburger" />
                </button>

                <div class="c-header__item c-header__item--search c-header__search--home">
                    <img class="o-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg"
                        alt="hamburger" />
                </div>

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
                    echo "<p class='c-menu__error c-menu__error--home'>* Primary menu not found</p>";
                }
                ?>

            </div>
        </header>

        <section class="c-home">

            <div class="c-home__context c-home__context--left">

                <div class="c-home__item c-home__item--bottom">

                    <div class="c-home__navigation">
                        <p class="c-navigation_title">Navigation</p>


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
                            echo "<p class='c-menu__error'>* Primary menu not found</p>";
                        }
                        ?>
                    </div>


                    <div class="c-home__carousel">

                        <p class="c-carousel__title">Recent Projects</p>

                        <div class="c-carousel__post-titles">
                            <h3 class="c-carousel__post-title">01 . Advertisement Poster</h3>
                            <h3 class="c-carousel__post-title">02 . special event or exhibit poster concept</h3>
                            <h3 class="c-carousel__post-title">03 . Advertisement Poster</h3>
                            <h3 class="c-carousel__post-title">04 . Advertisement Poster</h3>
                            <h3 class="c-carousel__post-title">05 . Advertisement Poster</h3>
                        </div>


                        <a href="#" class="c-carousel__more">View All Projects</a>

                    </div>

                </div>

            </div>

            <div class="c-home__context c-home__context--right">


                <div class="c-carousel">

                    <div class="c-carousel__title">
                        <p class="c-carousel__title c-carousel__title--home">Recent Projects</p>
                    </div>

                    <div class="c-carousel__slider">

                        <div class="c-carousel__context">
                            <div class="c-carousel__cell">
                                <img class="c-carousel__image"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel.jpg"
                                    alt="Advertisment poster" />

                            </div>
                            <div class="c-carousel__cell">
                                <img class="c-carousel__image"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel.jpg"
                                    alt="Advertisment poster" />

                            </div>
                            <div class="c-carousel__cell">
                                <img class="c-carousel__image"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel.jpg"
                                    alt="Advertisment poster" />

                            </div>
                            <div class="c-carousel__cell">
                                <img class="c-carousel__image"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel.jpg"
                                    alt="Advertisment poster" />

                            </div>
                            <div class="c-carousel__cell">
                                <img class="c-carousel__image"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel.jpg"
                                    alt="Advertisment poster" />

                            </div>
                        </div>
                    </div>



                    <div class="c-carousel__post-titles c-carousel__post-titles--mobile">
                        <h3 class="c-carousel__post-title c-carousel__post-title--home">01 . Advertisement Poster</h3>
                        <h3 class="c-carousel__post-title c-carousel__post-title--home">02 . Advertisement Poster</h3>
                        <h3 class="c-carousel__post-title c-carousel__post-title--home">03 . Advertisement Poster</h3>
                        <h3 class="c-carousel__post-title c-carousel__post-title--home">04 . Advertisement Poster</h3>
                        <h3 class="c-carousel__post-title c-carousel__post-title--home">05 . Advertisement Poster</h3>
                    </div>


                    <a href="#" class="c-carousel__more c-carousel__more--home">View All Projects</a>

                </div>

            </div>
        </section>

        <!-- #masthead -->

        <?php get_footer(); ?>
    </div>