<?php
/**
 * Template Name: Home
 */

get_header(); 
?>



<section class="flex flex-col items-center bg-white bg-opacity-0">
    <h2 class="text-2xl font-semibold leading-tight text-center text-cyan-950">
        BLOG
    </h2>
    <h3 class="mt-6 text-6xl font-semibold leading-tight text-center text-cyan-950 max-md:max-w-full max-md:text-4xl">
        Recent News from ISHAN KRSISHAN
    </h3>
    <a href="#" class="flex overflow-hidden gap-4 justify-center items-center py-2 pr-1.5 pl-5 mt-12 text-2xl font-semibold leading-tight text-white bg-cyan-950 min-h-[58px] rounded-[50px] max-md:mt-10">
        <span class="self-stretch my-auto">See All</span>
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/5ce64ba6ec88ef90da9e1b4338ca12d5e73ffcf82f4e30a2b38178d878143395?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba" class="object-contain shrink-0 self-stretch my-auto aspect-square fill-white w-[45px]" alt="Arrow icon" />
    </a>
    <div class="self-stretch mt-24 w-full max-md:mt-10 max-md:max-w-full">
        <div class="flex flex-wrap justify-center gap-10">
            <?php
                // Fetch the latest two posts
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 2,
                    'post_status'    => 'publish'
                ));

                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
            <article class="flex-grow flex-shrink-0 basis-[calc(50%-20px)] max-w-[600px] min-w-[300px]">
                <div class="relative h-[423px] rounded-[45px] overflow-hidden group">
                    <?php if (has_post_thumbnail()) : ?>
                        <img loading="lazy" src="<?php the_post_thumbnail_url(); ?>" class="object-cover absolute inset-0 w-full h-full transition-transform duration-300 group-hover:scale-110" alt="<?php the_title(); ?>" />
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-black bg-opacity-50 transition-opacity duration-300 group-hover:bg-opacity-40"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                        <h4 class="text-2xl font-semibold leading-tight mb-4"><?php the_title(); ?></h4>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 py-2 px-5 bg-gradient-to-r from-[#20DB81] to-[#97F85B] text-cyan-950 font-semibold rounded-full transition-transform duration-300 hover:scale-105">
                            <span>Read More</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No recent posts available.</p>';
                endif;
            ?>
        </div>
    </div>
</section>

<section class="flex flex-col pt-24 pb-20">
      <h2 class="self-start text-2xl font-semibold leading-tight text-cyan-950">
        OUR PRODUCTS
      </h2>
      <p
        class="mt-6 text-6xl font-semibold text-cyan-900 leading-[77px] max-md:mr-1 max-md:max-w-full max-md:text-4xl max-md:leading-[53px]"
      >
        Our expertise in
        <span
          class="bg-clip-text text-transparent bg-gradient-to-r from-[#20DB81] via-[#97F85B] to-[#25DC80]"
          >Agro-Based Products</span
        >
        ensures you get high quality products and supporting a company that is
        dedicated to making a positive impact.
      </p>
<div class="mt-24 w-full max-md:mt-10 max-md:max-w-full">
    <div class="swiper mySwiper">
        <div class="flex gap-5 swiper-wrapper ml-[100px] max-md:ml-0">
            <?php
            // Query for product categories
            $args = array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
            );

            $categories = get_terms($args);

            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {

                  // Check if the category name is "Uncategorized"
                  if ($category->name === 'Uncategorized') {
                    continue; // Skip this iteration if the category is "Uncategorized"
                }
                    // Get category image
                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                    $image = wp_get_attachment_url($thumbnail_id);
                    ?>
                    <article class="swiper-slide flex relative flex-col pt-96 max-md:w-full w-[340px] rounded-3xl max-md:pt-24 max-md:mt-5 h-[320px] overflow-hidden">
                        <img loading="lazy" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($category->name); ?>" class="object-cover absolute inset-0 size-full rounded-3xl" />
                        <div class="flex gap-5 absolute bottom-0 h-[100px] backdrop-blur-xl px-8 w-full justify-between items-center">
                            <h3 class="relative self-stretch my-auto text-3xl font-semibold leading-tight text-white">
                                <?php echo esc_html($category->name); ?>
                            </h3>
                            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e9f943c29d3010949e2442e0431491e3407ee21846aec16f323b7a5cb29bb2f0?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba" alt="" class="object-contain aspect-square fill-white w-[51px]" />
                        </div>
                    </article>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
</section>




<?php
get_footer(); 
?>
