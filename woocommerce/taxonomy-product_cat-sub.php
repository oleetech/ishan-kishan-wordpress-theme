<?php
// Include the header template
get_header(); 
?>

<?php
// Check if we are on a product category archive page
if (is_product_category()) {
    // Get the current category
    $current_category = get_queried_object();

    // Retrieve custom fields
    $custom_section_title = get_term_meta($current_category->term_id, 'custom_section_title', true);
    $custom_section_subheading = get_term_meta($current_category->term_id, 'custom_section_subheading', true);
    $custom_section_content = get_term_meta($current_category->term_id, 'custom_section_content', true);
    $custom_gutenberg_content = get_term_meta($current_category->term_id, 'custom_gutenberg_content', true);
    $custom_html = get_term_meta($current_category->term_id, 'custom_html', true);


}
?>
<section class="flex justify-center items-center w-full h-full relative">
    <?php 
    // Get the current category (sub-category)
    $term = get_queried_object();
    $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
    $featured_image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : get_template_directory_uri() . '/assets/images/default-page-feature.png';
    ?>
    <img src="<?php echo esc_url($featured_image_url); ?>" alt="<?php echo esc_attr($term->name); ?>" class="object-cover w-full h-[400px] rounded-3xl brightness-50">

    <h1 class="absolute left-auto right-auto bottom-auto top-auto text-white text-7xl font-[500] leading-tight">
        <?php echo esc_html($term->name); // Display the category name ?>
    </h1>
</section>
<section class="flex flex-col text-center mt-16 max-md:mt-10">
<div class="flex flex-col items-center">
    <h2 class="flex flex-wrap gap-2.5 text-center text-2xl font-medium leading-6 text-green-500">
        <?php
        if ($custom_section_title) {
            echo esc_html($custom_section_title);
        }
        ?>
        <span class="flex shrink-0 my-auto h-0.5 border-t-2 border-solid border-t-green-500 w-[51px]" aria-hidden="true"></span>
    </h2>

    <?php if ($custom_section_subheading) : ?>
        <p class="self-center mt-10 text-4xl font-semibold leading-10 text-zinc-800 max-md:max-w-full">
            <?php echo esc_html($custom_section_subheading); ?>
        </p>
    <?php endif; ?>

    <?php if ($custom_section_content) : ?>
        <p class="self-center mt-5 text-base leading-6 text-zinc-800 max-md:max-w-full">
            <?php echo esc_html($custom_section_content); ?>
        </p>
    <?php endif; ?>
</div>


    <!-- Products Section -->
    <div class="flex overflow-hidden flex-wrap gap-10 justify-center items-start mt-12 max-md:mt-10">
        <?php
        // WP Query to fetch WooCommerce products from a specific category (using $term->term_id for category ID)
        $args = array(
            'post_type' => 'product', // WooCommerce products
            'posts_per_page' => 12, // Number of products to display
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat', // WooCommerce product category
                    'field'    => 'term_id',
                    'terms'    => $term->term_id, // Current subcategory ID
                ),
            ),
        );
        $loop = new WP_Query($args);

        // Start the product loop
        if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post();
                global $product;
                $product_id = get_the_ID();
                $product_title = get_the_title();
                $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'medium');
                $product_desc = wp_trim_words(get_the_excerpt(), 25); // Limiting to 25 words for product description
        ?>
                <article class="flex overflow-hidden flex-col grow shrink bg-white rounded-xl shadow-lg min-w-[240px] w-[298px]">
                    <!-- Product Image -->
                    <img loading="lazy" src="<?php echo $product_image[0]; ?>" alt="<?php echo esc_attr($product_title); ?>" class="object-contain max-w-full aspect-[1.35]">
                    
                    <!-- Product Content -->
                    <div class="flex flex-col items-center px-6 pt-3.5 pb-8 w-full min-h-[199px] max-md:px-5">
                        <h3 class="text-2xl font-semibold leading-8 text-black">
                            <?php echo $product_title; ?>
                        </h3>
                        <p class="mt-3 text-base leading-6 text-neutral-500">
                            <?php echo $product_desc; ?>
                        </p>
                    </div>
                </article>
        <?php
            endwhile;
        else :
            echo '<p>No products found</p>';
        endif;

        // Reset Post Data
        wp_reset_postdata();
        ?>
    </div>
</section>

        <?php
    if ($custom_html) {
        echo  wp_kses_post($custom_html) ;
    }
        ?>

<!-- Product Gallery Section -->
<section class="flex flex-col justify-center items-center mt-24 max-md:mt-14">
    <h2 class="text-4xl font-semibold leading-10 text-center text-zinc-800 max-md:max-w-full">
        Browse Through Our Jute Sack Factory Productions
    </h2>
    <p class="mt-9 text-base leading-6 text-center text-zinc-800 max-md:max-w-full">
        Have a look at the product you must pick for your business. We help you find quality jute products anytime from anywhere.
    </p>
  
    <div class="flex flex-col self-stretch pb-4 mt-9 w-full">
        <!-- Loop through your products here -->
        <div class="grid grid-cols-3 gap-5 max-md:grid-cols-1">
            <?php
            // Reset WP_Query to fetch products again for gallery images
            $loop->rewind_posts();

            // Loop through products again to get gallery images
            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();
                    global $product;
                    $gallery_image_ids = $product->get_gallery_image_ids(); // Get gallery image IDs

                    // Check if there are gallery images
                    if ($gallery_image_ids) :
                        foreach ($gallery_image_ids as $gallery_image_id) :
                            $gallery_image_url = wp_get_attachment_url($gallery_image_id); // Get the image URL
            ?>
                            <!-- Product Item -->
                            <div class="flex flex-col">
                                <figure class="flex overflow-hidden flex-col grow min-h-[258px]">
                                    <img loading="lazy" src="<?php echo esc_url($gallery_image_url); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="object-contain w-full aspect-[1.5]">
                                </figure>
                            </div>
            <?php
                        endforeach;
                    endif;
                endwhile;
            else :
                echo '<p>No gallery images found</p>';
            endif;

            // Reset Post Data
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>



<?php
// Include the footer template
get_footer(); 
?>
