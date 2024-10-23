<?php
// Include the header template
get_header(); 
?>

<section class="flex justify-center items-center w-full h-full relative">
    <?php 
    // Get the featured image URL
    if (has_post_thumbnail()) {
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
    } else {
        // Load a default image from the theme's template directory
        $featured_image_url = get_template_directory_uri() . '/assets/images/default-page-feature.png';
    }
    ?>
    <img src="<?php echo esc_url($featured_image_url); ?>" alt="<?php the_title(); ?>" class="object-cover w-full h-[400px] rounded-3xl brightness-50">

    <h1 class="absolute left-auto right-auto bottom-auto top-auto text-white text-7xl font-[500] leading-tight">
        <?php the_title(); // Display the page title ?>
    </h1>
</section>

<!-- Custom HTML Section -->

    <?php 
    // Retrieve and display the custom HTML section
    $custom_html = get_post_meta(get_the_ID(), '_custom_html_section', true);
    if (!empty($custom_html)) {
        echo wp_kses_post($custom_html); // Safely output the custom HTML
    }
    ?>


<!-- Page Content Section -->

    <?php 
    // Start the Loop
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
            the_content(); // Display the page content
        endwhile;
    endif; 
    ?>





<?php
// Include the footer template
get_footer(); 
?>
