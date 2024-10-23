<section class="pt-0 pb-10 bg-transparent">
    <div class="flex gap-5 max-md:flex-col justify-center items-center relative">
        <img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/Ornament.png"
            alt=""
            class="absolute top-0 right-[100px] w-[500px] h-[500px] z-[-1] max-md:hidden"
        />
        <img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/Ornament.png"
            alt=""
            class="absolute top-[0px] left-[0px] w-[200px] h-[200px] z-[-1] max-md:hidden"
        />

        <div class="flex flex-col w-[66%] max-md:ml-0 max-md:w-full">
        <?php
            // Check if Redux framework is available
            if (class_exists('Redux')) {
                // Get the option values for the hero area
                $hero_title = Redux::getOption('theme-setting', 'hero_title');
                $hero_subtitle = Redux::getOption('theme-setting', 'hero_subtitle');
                $hero_button_text = Redux::getOption('theme-setting', 'hero_button_text');
            }
            
            ?>
            
            <div class="flex flex-col items-start w-full text-2xl font-semibold leading-tight max-md:mt-0 max-md:max-w-full">
                <h1 class="self-stretch text-8xl leading-[115px] text-cyan-950 max-md:max-w-full max-md:text-4xl max-md:leading-[53px]">
                <?php echo !empty($hero_title) ? esc_html($hero_title) : 'Empowering Agriculture, Nurturing Nature.'; ?>

                </h1>
                <p class="mt-12 text-neutral-400 max-md:mt-10 max-md:max-w-full">
                <?php echo !empty($hero_subtitle) ? esc_html($hero_subtitle) : 'Your trusted partner for sustainable agro-based products and solutions.'; ?>

                </p>
                <a
                    href="#"
                    class="flex overflow-hidden gap-4 justify-center items-center py-2 pr-1.5 pl-5 mt-20 text-white bg-lime-900 min-h-[58px] rounded-[50px] max-md:mt-10"
                >
                    <span class="self-stretch max-md:text-base my-auto">            <?php echo !empty($hero_button_text) ? esc_html($hero_button_text) : 'Explore Our Products'; ?>
                    </span>
                    <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/5ce64ba6ec88ef90da9e1b4338ca12d5e73ffcf82f4e30a2b38178d878143395?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                        class="object-contain shrink-0 self-stretch my-auto aspect-square fill-white w-[45px]"
                        alt=""
                    />
                </a>
            </div>
        </div>

        <div class="flex flex-row ml-5 w-[34%] max-md:ml-0 max-md:w-full hero-swiper heroSwiper overflow-hidden">
            <div class="flex flex-row swiper-wrapper">

                <?php
                // Fetch slider posts
                $slider_query = new WP_Query(array(
                    'post_type' => 'slider',
                    'posts_per_page' => 5, // Adjust the number of slides
                ));

                // Loop through the sliders
                if ($slider_query->have_posts()) :
                    while ($slider_query->have_posts()) : $slider_query->the_post();
                        // Check if the slider has a featured image
                        if (has_post_thumbnail()) {
                            $slider_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        } else {
                            // Fallback to default image
                            $slider_image = get_template_directory_uri() . '/assets/images/default-slider.jpg';
                        }
                        ?>
                        <img
                            loading="lazy"
                            src="<?php echo esc_url($slider_image); ?>"
                            class="masked-image block swiper-slide object-cover grow w-full aspect-[1.03] max-md:mt-10 max-md:max-w-full "
                            alt="<?php the_title(); ?>"
                        />
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback in case there are no slider posts
                    ?>
                    <img
                        loading="lazy"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/default-slider.jpg"
                        class="masked-image block swiper-slide object-cover grow w-full aspect-[1.03] max-md:mt-10 max-md:max-w-full"
                        alt="Default Slider Image"
                    />
                <?php
                endif;
                ?>
                
            </div>
        </div>
    </div>
</section>