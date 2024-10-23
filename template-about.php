<?php
/**
 * Template Name: About
 */

get_header(); 
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




<!-- Custom HTML Section -->
<div class="custom-html-section my-10">
    <?php 
    // Retrieve and display the custom HTML section
    $custom_html = get_post_meta(get_the_ID(), '_custom_html_section', true);
    if (!empty($custom_html)) {
        echo wp_kses_post($custom_html); // Safely output the custom HTML
    }
    ?>
</div>


<?php
// Fetch Redux options
$our_story_title = Redux::getOption('theme-setting', 'our_story_title');
$our_story_image = Redux::getOption('theme-setting', 'our_story_image');
$our_story_content = Redux::getOption('theme-setting', 'our_story_content');

$our_commitment_title = Redux::getOption('theme-setting', 'our_commitment_title');
$our_commitment_image = Redux::getOption('theme-setting', 'our_commitment_image');
$our_commitment_content = Redux::getOption('theme-setting', 'our_commitment_content');

// Fetching the commitment texts from Redux options
$commitment_quality = Redux::getOption('theme-setting', 'our_commitment_quality');
$commitment_community = Redux::getOption('theme-setting', 'our_commitment_community');
$commitment_sustainability = Redux::getOption('theme-setting', 'our_commitment_sustainability Text'); // Make sure to remove any spaces in the ID


$our_mission_title = Redux::getOption('theme-setting', 'our_mission_title');
$our_mission_image = Redux::getOption('theme-setting', 'our_mission_image');
$our_mission_content = Redux::getOption('theme-setting', 'our_mission_content');
?>


    <section
      class="flex gap-5 max-md:flex-col items-center pt-24 max-md:pt-5 pb-10"
    >
      <div class="flex flex-col w-[37%] max-md:ml-0 max-md:w-full">
      <?php if (isset($our_story_image['url'])): 
 ?>

        <img
          loading="lazy"
          src="<?php echo esc_url($our_story_image['url']); ?>"
          alt="Company image representing sustainable agro-based solutions"
          class="object-cover mt-2 w-full aspect-[1.04] max-md:mt-10 max-md:max-w-full masked-image"
        />

        <?php endif; ?>

      </div>
      <div class="flex flex-col ml-5 w-[63%] max-md:ml-0 max-md:w-full">
        <article
          class="flex z-10 flex-col items-start w-full text-2xl font-semibold leading-tight text-cyan-950 max-md:mt-10 max-md:-mr-2 max-md:max-w-full"
        >
          <h2>Our Story</h2>
          <h1
            class="mt-6 text-6xl font-semibold text-cyan-900 leading-[77px] max-md:mr-1 max-md:max-w-full max-md:text-4xl max-md:leading-[53px]"
          >
          <?php echo esc_html($our_story_title); ?>
            <span
              class="bg-clip-text text-transparent bg-gradient-to-r from-[#20DB81] via-[#97F85B] to-[#25DC80]"
              >Agro-based Industry</span
            >
            and Contributing to a Brighter Future.
          </h1>
          <p
            class="self-stretch mt-12 text-xl font-medium leading-6 text-neutral-400 max-md:mt-10 max-md:max-w-full"
          >
          <?php echo wp_kses_post($our_story_content); ?>

          </p>
          <p
            class="self-stretch mt-4 text-xl font-medium leading-6 text-neutral-400 max-md:mt-10 max-md:max-w-full"
          >
            Through our unwavering commitment to sustainability, quality, and
            innovation, Ishan Krishan aims to be a leader in the agro-based
            industry and contribute to a brighter future for Bangladesh
          </p>
        </article>
      </div>
    </section>
    <section class="flex flex-col pt-24 pb-10">
      <h2 class="self-start text-2xl font-semibold leading-tight text-cyan-950">
        OUR COMMITMENT
      </h2>
      <div class="mt-6 w-full max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col justify-center items-center">
          <div class="flex flex-col w-[55%] max-md:ml-0 max-md:w-full">
            <div class="flex flex-col max-md:mt-10 max-md:max-w-full">
              <h3
                class="text-6xl font-semibold leading-[77px] text-cyan-950 max-md:max-w-full max-md:text-4xl max-md:leading-[53px]"
              >
              <?php echo wp_kses_post($our_commitment_title); ?>
                
              </h3>
              <p
                class="mt-12 text-xl font-medium leading-6 text-neutral-400 max-md:mt-10 max-md:max-w-full"
              >
              <?php echo wp_kses_post($our_commitment_content); ?>

              </p>
              <a
                href="https://ishankrishan.com/contact/"
                class="flex overflow-hidden gap-4 justify-center items-center self-start py-2 pr-1.5 pl-5 mt-10 text-2xl font-semibold leading-tight text-white bg-cyan-950 min-h-[58px] rounded-[50px]"
              >
                <span class="self-stretch my-auto">Contact Us</span>
                <img
                  loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/5ce64ba6ec88ef90da9e1b4338ca12d5e73ffcf82f4e30a2b38178d878143395?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                  alt=""
                  class="object-contain shrink-0 self-stretch my-auto aspect-square fill-white w-[45px]"
                />
              </a>
            </div>
          </div>
          <div class="flex flex-col ml-5 w-[45%] max-md:ml-0 max-md:w-full">
            <div
              class="flex flex-col w-full max-md:mt-10 max-md:max-w-full gap-4"
            >
              <article
                class="flex flex-wrap gap-10 px-9 py-6 rounded-3xl border border-solid bg-zinc-100 border-neutral-400 max-md:px-5"
              >
                <img
                  loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/425fd7544ca9621a40d83d0d3c324a2f5d0e184357b0cd851888b0d78334df24?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                  alt="Sustainability icon"
                  class="object-contain shrink-0 my-auto aspect-square w-[72px]"
                />
                <div
                  class="flex flex-col grow shrink-0 basis-0 w-fit max-md:max-w-full"
                >
                  <h4
                    class="text-2xl font-semibold leading-tight text-cyan-950"
                  >
                    Quality
                  </h4>
                  <p
                    class="mt-6 text-xl font-medium leading-6 text-neutral-400 max-md:max-w-full"
                  >
                  <?php echo esc_html($commitment_quality); ?>

                  </p>
                </div>
              </article>
              <article
                class="flex flex-wrap gap-10 px-9 pt-6 pb-10 rounded-3xl border border-solid bg-zinc-100 border-neutral-400 max-md:px-5"
              >
                <img
                  loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/f3a709b45f5d8442c2f7a6c7eff9b88a6da6622a0d26a2a40f2190c82dea53e4?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                  alt="Expertise icon"
                  class="object-contain shrink-0 mt-4 aspect-square w-[72px]"
                />
                <div
                  class="flex flex-col grow shrink-0 basis-0 w-fit max-md:max-w-full"
                >
                  <h4
                    class="text-2xl font-semibold leading-tight text-cyan-950"
                  >
                    Community
                  </h4>
                  <p
                    class="mt-6 text-xl font-medium leading-6 text-neutral-400 max-md:max-w-full"
                  >
                  <?php echo esc_html($commitment_community); ?>
                   
                  </p>
                </div>
              </article>
              <article
                class="flex flex-wrap gap-10 px-9 py-6 rounded-3xl border border-solid bg-zinc-100 border-neutral-400 max-md:px-5"
              >
                <img
                  loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/c17dd1fef529067cae4c147d77be14c0396600c97934954a41231479cb4a89f5?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                  alt="Innovation icon"
                  class="object-contain shrink-0 my-auto aspect-square w-[72px]"
                />
                <div
                  class="flex flex-col grow shrink-0 basis-0 w-fit max-md:max-w-full"
                >
                  <h4
                    class="text-2xl font-semibold leading-tight text-cyan-950"
                  >
                    Sustainability
                  </h4>
                  <p
                    class="mt-6 text-xl font-medium leading-6 text-neutral-400 max-md:max-w-full"
                  >
                  <?php echo esc_html($commitment_sustainability); ?>
                    
                  </p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section
      class="flex gap-5 max-md:flex-col items-center pt-24 max-md:pt-5 pb-10"
    >
      <div class="flex flex-col w-[37%] max-md:ml-0 max-md:w-full">
      <?php 
        if (isset($our_mission_image['url'])): // Check if 'url' key exists
        ?>
        <img
          loading="lazy"
          src="<?php echo esc_url($our_mission_image['url']); ?>"
          alt="Company image representing sustainable agro-based solutions"
          class="object-cover mt-2 w-full aspect-[1.04] max-md:mt-10 max-md:max-w-full rounded-3xl"
        />
        <?php endif; ?>
      </div>
      <div class="flex flex-col ml-5 w-[63%] max-md:ml-0 max-md:w-full">
        <article
          class="flex z-10 flex-col items-start w-full text-2xl font-semibold leading-tight text-cyan-950 max-md:mt-10 max-md:-mr-2 max-md:max-w-full"
        >
          <h2>OUR MISSION</h2>
          <h1
            class="mt-6 text-6xl font-semibold text-cyan-900 leading-[77px] max-md:mr-1 max-md:max-w-full max-md:text-4xl max-md:leading-[53px]"
          >
        

            <?php echo wp_kses_post($our_mission_title); ?>
          </h1>
        </article>
      </div>
    </section>
    <section
      class="flex overflow-hidden bg-cyan-950 flex-col rounded-[45px] mt-12 max-md:mt-0 mb-24 max-lg:mx-5"
    >
      <header
        class="flex max-md:flex-col justify-between h-[468px] w-full bg-cyan-950 max-md:px-5 max-md:max-w-full"
      >
        <div class="flex flex-col w-[74%] max-md:ml-0 max-md:w-full">
          <div
            class="flex flex-col my-auto w-full font-semibold max-md:mt-10 max-md:max-w-full"
          >
            <h1
              class="text-6xl text-white leading-[77px] max-md:max-w-full max-md:text-4xl max-md:leading-[53px]"
            >
              We are the authorised dealer of ACI Motors.
            </h1>
			   <a href="https://ishankrishan.com/product-category/commercial-vehicles/">
            <button
              class="bg-gradient-to-r from-[#20DB81] to-[#97F85B] flex gap-4 items-center self-start py-2 pr-1.5 pl-5 mt-12 text-2xl max-md:text-xl leading-tight min-h-[58px] rounded-[50px] text-black max-md:mt-5"
            >
              <span>Commercial Vehicle</span>
              <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/3a122fcbdb661a754addb2d55fd91936b624e1cca4f5cc0236c9200fd00533ec?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                class="object-contain shrink-0 self-stretch my-auto aspect-square fill-white w-[45px]"
                alt=""
              />
            </button>
				   </a>
          </div>
        </div>
        <div
          class="flex flex-col w-[30%] ml-10 max-md:ml-0 max-md:w-full max-md:mt-10"
        >
          <img
            loading="lazy"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUSFGB2tIsiOh9y7Obtqpl891HDl18NGHF6w&s"
            class="object-cover w-full h-full ml-[20px] max-md:ml-0 max-md:rounded-3xl"
            alt=""
          />
        </div>
      </header>
    </section>

<!-- Page Content Section -->
<div class="content-container mx-auto my-10 px-5">
    <?php 
    // Start the Loop
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
            the_content(); // Display the page content
        endwhile;
    endif; 
    ?>
</div>

<?php
get_footer(); 
?>
