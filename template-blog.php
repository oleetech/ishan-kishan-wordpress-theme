<?php
/*
Template Name: Blog Page
*/
get_header(); // Include the header template
?>
<section class="flex justify-center items-center w-full h-full relative">
    <?php 
    // Get the current page/post ID
    $post_id = get_the_ID();

    // Get the featured image for the page, or fall back to a default image
    $featured_image_url = has_post_thumbnail($post_id) ? get_the_post_thumbnail_url($post_id) : get_template_directory_uri() . '/assets/images/default-page-feature.png';
    ?>

    <!-- Display the featured image -->
    <img src="<?php echo esc_url($featured_image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="object-cover w-full h-[400px] rounded-3xl brightness-50">

    <!-- Display the page title -->
    <h1 class="absolute left-auto right-auto bottom-auto top-auto text-white text-7xl font-[500] leading-tight">
        <?php echo esc_html(get_the_title()); ?>
    </h1>
</section>


<section class="flex mt-10 justify-between">
      <div class="flex flex-wrap gap-4">
        <input type="text" placeholder="Search news..." class="max-mad:w-full outline-none w-[340px] text-xl bg-zinc-100 p-2 pl-5 rounded-3xl focus:outline-none border border-zinc-300">
        <button class="bg-green-900 text-white px-5 py-2 rounded-3xl max-md:ml-0">
          Find News
        </button>
      </div>
      <div>
        <select class="text-xl bg-zinc-100 p-2 pl-5 rounded-2xl focus:outline-none border border-zinc-300">
          <option value="all">All</option>
          <option value="agriculture">Agriculture</option>
          <option value="commercial-vehicles">Commercial Vehicles</option>
        </select>
      </div>
    </section>

<section class="flex flex-col pt-10 max-md:pt-5 pb-10">
<?php
// Get the latest featured post
$args = array(
    'meta_key'   => '_is_ns_featured_post', // Assuming you are using a plugin or custom field to mark featured posts
    'meta_value' => 'yes',
    'posts_per_page' => 1
);

$featured_query = new WP_Query($args);

if ($featured_query->have_posts()) : 
    while ($featured_query->have_posts()) : $featured_query->the_post();
        // Get featured image URL
        $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
?>

<header class="flex relative flex-col items-start px-20 pt-60 pb-16 w-full font-semibold min-h-[532px] max-md:px-5 max-md:pt-24 max-md:max-w-full">
    <img loading="lazy" src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title(); ?>" class="object-cover absolute inset-0 size-full brightness-50 rounded-3xl">
    <div class="flex relative flex-col max-w-full w-[998px]">
        <h1 class="text-6xl text-white leading-[77px] max-md:max-w-full max-md:text-4xl max-md:leading-[53px]">
            <?php the_title(); ?>
        </h1>
        <a href="<?php the_permalink(); ?>" class="flex bg-gradient-to-r from-[#00cd52] to-[#009d1d] overflow-hidden gap-4 justify-center items-center self-start py-2 pr-1.5 pl-5 mt-12 text-2xl leading-tight min-h-[58px] rounded-[50px] text-cyan-950 max-md:mt-10">
            <span class="self-stretch my-auto">Read More</span>
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/86ba6e60d115fa58e2d8bb5989bd2c3b265e56a91bf605de7b4042885e13e907?placeholderIfAbsent=true&amp;apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba" alt="Read More Icon" class="object-contain shrink-0 self-stretch my-auto aspect-square rounded-[360px] w-[45px]">
        </a>
    </div>
</header>

<?php
    endwhile; 
    wp_reset_postdata();
else :
    // No featured post found
    echo '<p>No featured post found.</p>';
endif;
?>


<!-- Post Loop Section -->
<div class="mt-12 w-full max-md:mt-10 max-md:max-w-full">
    <div class="flex gap-5 max-md:flex-col">
        <?php 
        // Query for the remaining posts excluding the featured one
        $args = array(
            'posts_per_page' => 6, // Number of posts to show
            'post__not_in' => wp_list_pluck($featured_query->posts, 'ID') // Exclude the featured post
        );

        $the_query = new WP_Query($args);

        // Start the loop
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
                $post_image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID()) : 'https://images.unsplash.com/photo-1687099415810-8a94461aa111?w=500&auto=format&fit=crop&q=60';
                ?>
                <article class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
                    <div class="flex relative flex-col grow px-12 pt-36 pb-14 font-semibold min-h-[363px] max-md:px-5 max-md:pt-24 max-md:mt-5 max-md:max-w-full">
                        <img loading="lazy" src="<?php echo esc_url($post_image_url); ?>" alt="<?php the_title(); ?>" class="object-cover absolute inset-0 size-full brightness-50 rounded-3xl">
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
            <?php endwhile;
        else :
            echo '<p>No posts found.</p>';
        endif;

        wp_reset_postdata(); // Reset the global post object after custom query
        ?>
    </div>
</div>
</section>
<?php get_footer(); // Include the footer template ?>
