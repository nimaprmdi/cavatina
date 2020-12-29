<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_meliora
 */

get_header();
?>

<main class="o-page__main">

    <div class="o-page__col c-aside">

        <div class="c-aside__content">

            <div class="c-aside__context">

                <h4 class="c-aside__title">Projects</h4>
                <span class="c-aside__counter">12 Portfolios</span>

            </div>

            <img class="o-image" onClick="searchToggle()"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg" alt="hamburger" />

            <div class="c-search">

                <input id="searchInput" type="search" name="s" class="c-search__input form-control search-field"
                    placeholder="Search…" autocomplete="off" value="" aria-describedby="Search Field"
                    title="Search for:">


            </div>

        </div>

    </div>


    <div class="o-page__col c-content">

        <div class="c-single">


            <div class="c-single__context">


                <div class="c-single__context__holder">


                    <h2 class="single__title">Advertisement Poster</h2>

                    <ul class="c-single__meta">
                        <li>Commercial</li>
                        <li>April 2019</li>
                    </ul>


                    <p class="c-single__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at arcu
                        dui. Aenean placerat
                        mauris nisl. Proin vitae urna eu sem pellentesque laoreet. Mauris varius quam ut libero
                        tempor rutrum. Sed quis maximus nunc. Nulla eu erat vel nunc consectetur ornare. Nam
                        bibendum cursus viverra. Aenean placerat bibendum quam, eugiat elit tincidunt in. Curabitur
                        nec aliquet erat, et dictum nulla. eugiat elit tincidunt in. Curabitur nec aliquet erat, et
                        dictum nulla.Sed quis maximus nunc. Nulla eu erat vel nunc consectetur ornare.Sed quis
                        maximus nunc.Sed at arcu dui. Aenean placerat mauris nisl.</p>

                </div>

            </div>


            <div class="c-single__carousel c-single__carousel--mobile">

                <h2 class="single__title">Advertisement Poster</h2>

                <ul class="c-single__meta">
                    <li>Commercial</li>
                    <li>April 2019</li>
                </ul>

                <div class="c-single__slider ">


                    <div class="carousel__cell__single">
                        <img class="o-imagce"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/post-images/single-carousel/img(1).jpg"
                            alt="hamburger" />
                    </div>


                    <div class="carousel__cell__single">
                        <img class="o-imagec"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/post-images/single-carousel/img(2).jpg"
                            alt="hamburger" />
                    </div>


                    <div class="carousel__cell__single">
                        <img class="o-imagec"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/post-images/single-carousel/img(3).jpg"
                            alt="hamburger" />
                    </div>

                </div>
            </div>
        </div>

    </div>


</main><!-- #main -->

<?php
get_footer();