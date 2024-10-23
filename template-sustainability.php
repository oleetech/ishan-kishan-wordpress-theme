<?php
/**
 * Template Name: Sustainability
 */

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






<section class="flex flex-col pt-24 max-md:pt-5 pb-10">
      <div class="w-full max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col justify-center items-center">
          <div class="flex flex-col w-[55%] max-md:ml-0 max-md:w-full">
            <div class="flex flex-col max-md:mt-10 max-md:max-w-full">
              <h3
                class="text-6xl font-semibold leading-[77px] text-cyan-950 max-md:max-w-full max-md:text-4xl max-md:leading-[53px]"
              >
                Leading Agro-based Company Dedicated to Providing Sustainable
                Solutions.
              </h3>
              <p
                class="mt-12 text-xl font-medium leading-6 text-neutral-400 max-md:mt-10 max-md:max-w-full"
              >
                We strive to empower farmers, promote environmental
                conservation, and enhance the livelihoods of communities.
              </p>
              <a
                href="https://ishankrishan.com/contact/"
                class="flex overflow-hidden gap-4 justify-center items-center self-start py-2 pr-1.5 pl-5 mt-10 text-2xl font-semibold leading-tight text-white bg-gradient-to-r from-[#00cd52] to-[#009d1d] min-h-[58px] rounded-[50px]"
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
                    Jute: A Sustainable and Versatile Fiber
                  </h4>
                  <p
                    class="mt-6 text-xl font-medium leading-6 text-neutral-400 max-md:max-w-full"
                  >
                    In Bangladesh, the jute industry plays a crucial role in
                    promoting sustainable agriculture and reducing the country's
                    ecological footprint.
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
                    Agricultural Machinery: Enhancing Productivity and
                    Efficiency
                  </h4>
                  <p
                    class="mt-6 text-xl font-medium leading-6 text-neutral-400 max-md:max-w-full"
                  >
                    By mechanizing tasks such as plowing, sowing, harvesting,
                    and threshing, farmers can cover larger areas of land in a
                    shorter amount of time.
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
                    Organic Goods: A Sustainable and Healthy Choice
                  </h4>
                  <p
                    class="mt-6 text-xl font-medium leading-6 text-neutral-400 max-md:max-w-full"
                  >
                    While the initial cost may be slightly higher than
                    conventional products, the long-term benefits, including
                    durability and reduced environmental impact, can make them a
                    worthwhile investment.
                  </p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section
      class="flex overflow-hidden flex-col"
      style="background-image: url(./assets/images/sustainability-bg.png)"
    >
      <div
        class="flex flex-col items-center px-20 py-20 w-full max-md:px-5 max-md:max-w-full"
      >
        <h2
          class="text-2xl font-semibold leading-tight text-center text-cyan-950"
        >
          HOW WE WORK
        </h2>
        <h3
          class="mt-6 text-6xl font-semibold leading-tight text-center text-cyan-950 max-md:max-w-full max-md:text-4xl"
        >
          Why Choose Ishan Krishan
        </h3>
        <div class="mt-24 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col">
            <article
              class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full h-[500px]"
            >
              <div
                class="flex flex-col h-full items-center px-4 pt-7 pb-32 w-full leading-tight text-center border border-solid bg-cyan-950 border-neutral-400 rounded-[45px] max-md:px-5 max-md:pb-24 max-md:mt-4 max-md:max-w-full"
              >
                <div class="flex flex-col items-center max-w-full w-auto">
                  <img
                    loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/3a76f11a347e1123f9bccea6151fc1e219359c38f1f05e08b94196af10b32e5a?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                    class="object-contain aspect-square w-[55px] invert"
                    alt="Icon representing a feature"
                  />
                  <h4
                    class="mt-4 text-2xl font-semibold text-white max-md:text-4xl"
                  >
                    Jute: A Sustainable and Versatile Fiber
                  </h4>
                  <p
                    class="mt-12 text-xl font-medium text-neutral-400 max-md:mt-10"
                  >
                    In Bangladesh, the jute industry plays a crucial role in
                    promoting sustainable agriculture and reducing the country's
                    ecological footprint.
                  </p>
                </div>
              </div>
            </article>
            <article
              class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full h-[500px]"
            >
              <div
                class="flex flex-col h-full items-center px-4 pt-7 pb-32 w-full leading-tight text-center border border-solid bg-cyan-950 border-neutral-400 rounded-[45px] max-md:px-5 max-md:pb-24 max-md:mt-4 max-md:max-w-full"
              >
                <div class="flex flex-col items-center max-w-full w-auto">
                  <img
                    loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/5d82cb4be6deaaf6b9419cc4a5edfe841699e4c3b6fca2a9b4e9976c98239d90?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                    class="object-contain aspect-square w-[55px] invert"
                    alt="Icon representing a feature"
                  />
                  <h4
                    class="mt-4 text-2xl font-semibold text-white max-md:text-4xl"
                  >
                    Agricultural Machinery: Enhancing Productivity
                  </h4>
                  <p
                    class="mt-12 text-xl font-medium text-neutral-400 max-md:mt-10"
                  >
                    By mechanizing tasks such as plowing, sowing, harvesting,
                    and threshing, farmers can cover larger areas of land in a
                    shorter amount of time.
                  </p>
                </div>
              </div>
            </article>
            <article
              class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full h-[500px]"
            >
              <div
                class="flex flex-col h-full items-center px-4 pt-7 pb-32 w-full leading-tight text-center border border-solid bg-cyan-950 border-neutral-400 rounded-[45px] max-md:px-5 max-md:pb-24 max-md:mt-4 max-md:max-w-full"
              >
                <div class="flex flex-col items-center max-w-full w-auto">
                  <img
                    loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/485020cffe4ed423515a2b9d80f1b1b98c6ab55915993cd86cb357f973d7bbd8?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                    class="object-contain aspect-square w-[55px] invert"
                    alt="Icon representing a feature"
                  />
                  <h4
                    class="mt-4 text-2xl font-semibold text-white max-md:text-4xl"
                  >
                    Organic Goods: A Sustainable and Healthy
                  </h4>
                  <p
                    class="mt-12 text-xl font-medium text-neutral-400 max-md:mt-10"
                  >
                    While the initial cost may be slightly higher than
                    conventional products, the long-term benefits, including
                    durability and reduced environmental impact, can make them a
                    worthwhile investment.
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>


<?php
get_footer(); 
?>
