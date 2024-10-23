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
        <?php echo esc_html($term->name); // Display the category name ?> - Products
    </h1>
</section>

<section class="subcategory-list mt-16">
    <div class="container">

        <?php 
        // Get the subcategories of the current category
        $args = array(
            'taxonomy'     => 'product_cat',
            'child_of'     => $term->term_id, // Get subcategories of the current category
            'hide_empty'   => false,           // Only show categories with products
        );

        // Get the subcategories
        $subcategories = get_categories($args);

        if (!empty($subcategories)) :
            $counter = 0;

            foreach ($subcategories as $subcategory) :
                $thumbnail_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
                $subcategory_image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : get_template_directory_uri() . '/assets/images/default-subcategory-image.png';
                $subcategory_link = get_term_link($subcategory); // Get subcategory link

                // Start a new section for each subcategory
                echo '<section class="mt-24 w-full max-w-[1686px] max-md:mt-6 max-md:max-w-full">';
                echo '<article class="flex gap-5 max-md:flex-col">';

                // Alternate positions based on whether $counter is odd or even
                if ($counter % 2 == 0) {
                    // Even: Image first, content second
                    echo '
                    <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                        <img loading="lazy" src="' . esc_url($subcategory_image_url) . '" alt="' . esc_attr($subcategory->name) . '" class="object-contain grow w-full aspect-[2.18] rounded-[45px] max-md:mt-10 max-md:max-w-full">
                    </div>
                    <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col self-stretch my-auto w-full font-semibold leading-tight max-md:mt-10 max-md:max-w-full">
                            <h2 class="text-5xl text-cyan-950 max-md:text-4xl">' . esc_html($subcategory->name) . '</h2>
                            <p class="mt-12 text-xl font-medium leading-6 text-neutral-400 max-md:mt-10 max-md:max-w-full">' . esc_html($subcategory->description) . '</p>
                            <a href="' . esc_url($subcategory_link) . '" class="flex overflow-hidden gap-4 justify-center items-center self-start py-2 pr-1.5 pl-5 mt-12 text-2xl text-white bg-cyan-950 min-h-[58px] rounded-[50px] max-md:mt-10">
                                <span class="self-stretch my-auto">See Detail</span>
                                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/772df25108e22ef927df80884fdf5813a7617a4c15a12ef34cf5bb1b82231100?placeholderIfAbsent=true&amp;apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba" alt="" class="object-contain shrink-0 self-stretch my-auto aspect-square fill-white w-[45px]">
                            </a>
                        </div>
                    </div>';
                } else {
                    // Odd: Content first, image second
                    echo '
                    <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col self-stretch my-auto w-full font-semibold leading-tight max-md:mt-10 max-md:max-w-full">
                            <h2 class="text-5xl text-cyan-950 max-md:text-4xl">' . esc_html($subcategory->name) . '</h2>
                            <p class="mt-12 text-xl font-medium leading-6 text-neutral-400 max-md:mt-10 max-md:max-w-full">' . esc_html($subcategory->description) . '</p>
                            <a href="' . esc_url($subcategory_link) . '" class="flex overflow-hidden gap-4 justify-center items-center self-start py-2 pr-1.5 pl-5 mt-12 text-2xl text-white bg-cyan-950 min-h-[58px] rounded-[50px] max-md:mt-10">
                                <span class="self-stretch my-auto">See Detail</span>
                                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/772df25108e22ef927df80884fdf5813a7617a4c15a12ef34cf5bb1b82231100?placeholderIfAbsent=true&amp;apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba" alt="" class="object-contain shrink-0 self-stretch my-auto aspect-square fill-white w-[45px]">
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                        <img loading="lazy" src="' . esc_url($subcategory_image_url) . '" alt="' . esc_attr($subcategory->name) . '" class="object-contain grow w-full aspect-[2.18] rounded-[45px] max-md:mt-5 max-md:max-w-full">
                    </div>';
                }

                echo '</article></section>';
                
                $counter++;

            endforeach;
        else :
            echo '<p>No subcategories found.</p>';
        endif;
        ?>

    </div>
</section>

<?php
// Include the footer template
get_footer(); 
?>
