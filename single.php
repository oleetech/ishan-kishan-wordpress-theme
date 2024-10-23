<?php
get_header(); // Include the header
?>

<section class="flex justify-center items-center w-full h-full relative">
    <?php 
    // Get the featured image (thumbnail) for the current page/post
    if (has_post_thumbnail()) {
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    } else {
        // Default fallback image if no featured image is set
        $featured_image_url = has_post_thumbnail($post_id) ? get_the_post_thumbnail_url($post_id) : get_template_directory_uri() . '/assets/images/default-page-feature.png';
    }
    
    // Get the page title
    $page_title = get_the_title();
    
    // Get the publish date
    $publish_date = get_the_date('F jS Y');
    ?>

    <!-- Display the featured image -->
    <img src="<?php echo esc_url($featured_image_url); ?>" alt="<?php echo esc_attr($page_title); ?>" class="object-cover w-full h-[400px] rounded-3xl brightness-50">

    <!-- Display the page title -->
    <h1 class="absolute left-[10%] right-auto bottom-auto top-[25%] text-white text-7xl max-md:max-w-full max-md:text-3xl font-[500] leading-[74px]">
        <?php echo esc_html($page_title); ?>
    </h1>

    <!-- Display the publish date -->
    <p class="absolute left-[10%] right-auto bottom-auto top-[70%] max-md:top-[60%] max-md:w-[70%] text-gray-100 text-2xl max-md:text-xl font-[500] leading-tight">
        Posted on <?php echo esc_html($publish_date); ?>
    </p>
</section>

<section class="flex flex-row max-md:flex-col gap-10 mt-10">
<!--     <section class="flex flex-col bg-gray-100 rounded-3xl p-10 max-md:max-w-full max-md:w-[340px] w-auto h-min w-[20%]">
        <h1 class="text-2xl font-semibold leading-10 mb-4">Table of contents</h1>
        <ul class="flex flex-col gap-4">
            <?php
            // Function to add IDs to headings
            function add_id_to_headings($content) {
                return preg_replace_callback('/<h([23])>(.*?)<\/h[23]>/', function ($matches) {
                    $id = sanitize_title($matches[2]); // Generate ID based on the heading text
                    return '<h' . $matches[1] . ' id="' . esc_attr($id) . '">' . $matches[2] . '</h' . $matches[1] . '>';
                }, $content);
            }

            // Get the post content and apply the filter to it
            $content = get_the_content();
            $content_with_ids = add_id_to_headings($content); // Apply the function directly

            // Find all <h2> and <h3> tags in the content for the TOC
            preg_match_all('/<h[23]>(.*?)<\/h[23]>/', $content_with_ids, $matches);
            
            if (!empty($matches[1])) {
                foreach ($matches[1] as $key => $heading) {
                    // Create anchor links for each heading
                    $anchor = sanitize_title($heading); // Create URL-friendly anchor
                    echo '<li><a href="#' . esc_attr($anchor) . '" class="text-cyan-950">' . esc_html($heading) . '</a></li>';
                }
            }
            ?>
        </ul>
    </section> -->
<section class="flex flex-col bg-gray-100 rounded-3xl p-10 max-md:max-w-full max-md:w-[340px] w-auto h-min w-[20%]" id="table-of-contents">
    <h1 class="text-2xl font-semibold leading-10 mb-4">
      Table of contents
    </h1>
    <ul class="flex flex-col gap-4" id="toc-list">
        <!-- JavaScript will inject the list items here -->
    </ul>
</section>
	
    <section class="flex flex-col text-xl font-medium leading-6 text-cyan-950 w-[80%] max-md:w-full">
        <article class="max-md:max-w-full" id="post-content">
            <?php
            // Display the post content with IDs in headings
            echo wp_kses_post($content_with_ids);
            ?>
        </article>
    </section>
</section>


<section>
    <h1 class="text-4xl font-semibold leading-10 mb-4 mt-10">Related Articles</h1>
    <div class="mt-12 w-full max-md:mt-10 max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col">
            <?php
            // Get related posts by category or tag
            $categories = wp_get_post_categories(get_the_ID()); // Get current post's categories
            if ($categories) {
                $args = array(
                    'category__in'   => $categories, // Match current post's categories
                    'post__not_in'   => array(get_the_ID()), // Exclude current post
                    'posts_per_page' => 3, // Number of related posts to display
                    'orderby'        => 'rand' // Randomize the order
                );

                $related_posts = new WP_Query($args);

                if ($related_posts->have_posts()) {
                    while ($related_posts->have_posts()) : $related_posts->the_post();
                        ?>
                        <article class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
                            <div class="flex relative flex-col grow px-12 pt-36 pb-14 font-semibold min-h-[363px] max-md:px-5 max-md:pt-24 max-md:mt-5 max-md:max-w-full">
                                <img loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="object-cover absolute inset-0 size-full brightness-50 rounded-3xl">
                                <div class="flex relative flex-col w-full max-md:max-w-full">
                                    <h2 class="text-3xl leading-10 text-white max-md:max-w-full">
                                        <?php the_title(); ?>
                                    </h2>
                                    <a href="<?php the_permalink(); ?>" class="flex bg-gradient-to-r from-[#00cd52] to-[#009d1d] overflow-hidden gap-4 justify-center items-center self-start py-2 pr-1.5 pl-5 mt-12 text-2xl leading-tight min-h-[58px] rounded-[50px] text-cyan-950 max-md:mt-10">
                                        <span class="self-stretch my-auto">Read More</span>
                                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/86ba6e60d115fa58e2d8bb5989bd2c3b265e56a91bf605de7b4042885e13e907?placeholderIfAbsent=true&amp;apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba" alt="" class="object-contain shrink-0 self-stretch my-auto aspect-square rounded-[360px] w-[45px]">
                                    </a>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata(); // Reset the post data after the query
                }
            }
            ?>
        </div>
    </div>
</section>

<?php get_footer(); // Include the footer template ?>
