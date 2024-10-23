<?php
// Include the header template
get_header(); 
?>

<section class="flex justify-center items-center w-full h-full relative">
    <?php 
    // Get the current category (Jute Bag category)
    $term = get_queried_object();
    $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
    $featured_image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : get_template_directory_uri() . '/assets/images/default-page-feature.png';
    ?>
    <img src="<?php echo esc_url($featured_image_url); ?>" alt="<?php echo esc_attr($term->name); ?>" class="object-cover w-full h-[400px] rounded-3xl brightness-50">

    <h1 class="absolute left-auto right-auto bottom-auto top-auto text-white text-7xl font-[500] leading-tight">
        <?php echo esc_html($term->name); // Display the category name ?>
    </h1>
</section>



<!-- Product Listing Section -->
<section class="flex flex-col text-center mt-16 max-md:mt-10">

    <?php 
    // Get the current category (Jute Bag category)
    $term = get_queried_object(); 
    $custom_title = get_term_meta($term->term_id, 'custom_title', true);
    $custom_short_description = get_term_meta($term->term_id, 'custom_short_description', true);
    ?>


<div class="flex flex-col items-center">
    <?php 
    // Get the current category (Jute Bag category)
    $term = get_queried_object(); 
    $custom_title = get_term_meta($term->term_id, 'custom_title', true);
    $custom_short_description = get_term_meta($term->term_id, 'custom_short_description', true);
    $category_description = term_description($term->term_id, 'product_cat');
    ?>
    
    <?php if (!empty($custom_title)) : ?>
        <h2 class="flex flex-wrap gap-2.5 text-center text-2xl font-medium leading-6 text-green-500">
            <?php echo esc_html($custom_title); ?>
            <span class="flex shrink-0 my-auto h-0.5 border-t-2 border-solid border-t-green-500 w-[51px]" aria-hidden="true"></span>
        </h2>
    <?php endif; ?>
    
    <?php if (!empty($custom_short_description)) : ?>
        <p class="self-center mt-10 text-base leading-6 text-zinc-800 max-md:max-w-full">
            <?php echo wp_kses_post($custom_short_description); ?>
        </p>
    <?php endif; ?>
    
    <?php if (!empty($category_description)) : ?>
        <p class="self-center mt-5 text-base leading-6 text-zinc-800 max-md:max-w-full">
            <?php echo wp_kses_post($category_description); ?>
        </p>
    <?php endif; ?>


</div>

    
    <div class="flex overflow-hidden flex-wrap gap-10 justify-center items-start mt-12 max-md:mt-10">
        <?php 
        // Start the product loop
        if (have_posts()) : 
            while (have_posts()) : the_post(); ?>
                <article class="flex overflow-hidden flex-col grow shrink bg-white rounded-xl shadow-lg min-w-[240px] w-[298px]">
                    <?php 
                    // Product Thumbnail
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full', [ // Change 'medium' to 'full'
                            'loading' => 'lazy',
                            'class' => 'object-contain max-w-full aspect-[1.35]',
                        ]);
                    } else {
                        echo '<img loading="lazy" src="' . esc_url(get_template_directory_uri() . '/assets/images/default-product-image.png') . '" alt="' . esc_attr(get_the_title()) . '" class="object-contain max-w-full aspect-[1.35]">';
                    }
                    ?>
                    <div class="flex flex-col items-center px-6 pt-3.5 pb-8 w-full min-h-[199px] max-md:px-5">
                        <h3 class="text-2xl font-semibold leading-8 text-black">
                            <?php the_title(); ?>
                        </h3>
                        <p class="mt-3 text-base leading-6 text-neutral-500">
                            <?php
                            // Display product excerpt
                            echo wp_trim_words(get_the_excerpt(), 20, '...'); 
                            ?>
                        </p>
                    </div>
                </article>
            <?php endwhile; 
        else : ?>
            <p class="text-center text-lg">No products found in this category.</p>
        <?php endif; ?>
    </div>
</section>





<!-- Product Gallery Images Section from Subcategory Products -->
<section class="flex flex-col justify-center items-center mt-24 max-md:mt-14">
    <h2 class="text-4xl font-semibold leading-10 text-center text-zinc-800 max-md:max-w-full">
        Browse Through Our Jute Sack Factory Productions
    </h2>
    <p class="mt-9 text-base leading-6 text-center text-zinc-800 max-md:max-w-full">
        Have a look at the product you must pick for your business. We help you find quality jute products anytime from anywhere.
    </p>
    
    <div class="flex flex-col self-stretch pb-4 mt-9 w-full min-h-[1px] max-md:max-w-full">
        <?php 
        // Query to get all products in the current subcategory
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id, // Current subcategory term ID
                ),
            ),
        );
        
        $products = new WP_Query($args);
        if ($products->have_posts()) :
            $counter = 0; // Initialize counter
            while ($products->have_posts()) : $products->the_post();
                $product = wc_get_product(get_the_ID());
                $gallery_image_ids = $product->get_gallery_image_ids();
                
                if ($gallery_image_ids) :
                    foreach ($gallery_image_ids as $image_id) :
                        $gallery_image_url = wp_get_attachment_url($image_id);
                        $counter++; // Increment counter
                        
                        // Start a new row every three images
                        if ($counter % 3 == 1): ?>
                            <div class="w-full max-md:max-w-full">
                                <div class="flex gap-5 max-md:flex-col">
                        <?php endif; ?>
                        
                        <div class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
                            <figure class="flex overflow-hidden flex-col grow min-h-[258px] max-md:mt-5">
                                <img loading="lazy" src="<?php echo esc_url($gallery_image_url); ?>" class="object-contain w-full aspect-[1.5]" alt="<?php echo esc_attr(get_the_title()); ?>">
                            </figure>
                        </div>
                        
                        <?php if ($counter % 3 == 0): ?>
                                </div>
                            </div>
                        <?php endif;
                        
                    endforeach; // End foreach
                endif; // End if gallery images
            endwhile; // End while
            wp_reset_postdata(); // Reset post data
        else : ?>
            <p class="text-center text-lg">No products found in this subcategory.</p>
        <?php endif; ?>
    </div>
</section>


<?php
// Include the footer template
get_footer(); 
?>
