<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=0.8" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap"
        rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Dynamically generate the title -->
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- Enqueue the main style.css file -->
    <link
        rel="stylesheet"
        href="<?php echo esc_url(get_stylesheet_directory_uri() . '/style.css'); ?>"
    />

    <!-- Meta Description -->
    <?php if (is_single() || is_page()) : ?>
        <meta name="description" content="<?php echo esc_attr(get_the_excerpt()); ?>" />
    <?php elseif (is_home() || is_front_page()) : ?>
        <meta name="description" content="<?php bloginfo('description'); ?>" />
    <?php endif; ?>

    <!-- Swiper JS -->
    <!-- Add your Swiper JS files here if needed -->

    <?php wp_head(); ?>
</head>

<body
    class="max-w-full mx-auto bg-gradient-to-b from-slate-50 to-lime-300 overflow-x-hidden"
  >




    <header
      class="flex flex-wrap gap-10 justify-between w-full max-w-[1300px] mx-auto max-lg:px-5"
    >
      <div
        class="flex gap-6 text-5xl font-bold leading-tight text-cyan-950 max-md:text-4xl"
      >
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
          <?php
        if (function_exists('the_custom_logo') && has_custom_logo()) {
            // Display the custom logo with the additional class and attributes
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo_url = wp_get_attachment_image_src($custom_logo_id, 'full')[0];

            echo '<img loading="lazy" src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '" class="object-contain shrink-0 aspect-[0.98] fill-[linear-gradient(267deg,#20DB81_0%,#97F85B_32.19%,#97F85B_66.98%,#25DC80_99.69%)] w-[200px]" />';
          } else { echo '<img
            loading="lazy"
            src="' . get_template_directory_uri() . '/assets/images/logo.png"
            alt="Site Logo"
            class="object-contain shrink-0 aspect-[0.98] fill-[linear-gradient(267deg,#20DB81_0%,#97F85B_32.19%,#97F85B_66.98%,#25DC80_99.69%)] w-[200px]"
          />'; } ?>
        </a>
      </div>
      <nav
        class="flex relative h-auto max-lg:hidden flex-wrap gap-10 items-start my-auto text-2xl font-semibold leading-tight text-black max-md:max-w-full"
      >
        <a
          href="<?php echo esc_url(home_url('/')); ?>"
          class="focus:outline-none focus:ring-2 focus:ring-cyan-950"
          >Home</a
        >
        <a
          href="https://ishankrishan.com/about-us/"
          class="gap-2.5 self-stretch focus:outline-none focus:ring-2 focus:ring-cyan-950"
          >About Us</a
        >
        <a
          href=""
          class="flex gap-2.5 focus:outline-none focus:ring-2 focus:ring-cyan-950"
          onmouseenter="handleDropdownMenu('products-dropdown-menu')"
          >Products<span id="products-dropdown">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="#000000"
              viewBox="0 0 256 256"
              class="mt-1"
            >
              <path
                d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"
              ></path>
            </svg>
          </span>
        </a>
        <div
          id="products-dropdown-menu"
          class="hidden bg-white rounded-lg gap-3 absolute top-[50px] left-[240px] w-[270px] z-[1000] flex flex-col h-auto overflow-y-auto overflow-x-hidden"
        >
          <a
            href="https://ishankrishan.com/product-category/jute/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2 flex justify-between"
            onmouseenter="handleDropdownMenu('jute-dropdown-menu')"
            >Jute
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="#000000"
                viewBox="0 0 256 256"
              >
                <path
                  d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"
                ></path>
              </svg>
            </span>
          </a>

          <a
            href="https://ishankrishan.com/product-category/organic-products/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2 flex justify-between"
            onmouseenter="handleDropdownMenu('organic-dropdown-menu')"
            >Organic Goods
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="#000000"
                viewBox="0 0 256 256"
              >
                <path
                  d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"
                ></path>
              </svg>
            </span>
          </a>
          <a
            href="https://ishankrishan.com/product-category/agricultural-machineries/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2 flex justify-between"
            onmouseenter="handleDropdownMenu('agricultural-machineries-dropdown-menu')"
            >Agricultural Machineries
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="#000000"
                viewBox="0 0 256 256"
              >
                <path
                  d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"
                ></path>
              </svg>
            </span>
          </a>
          <a
            href="https://ishankrishan.com/product-category/commercial-vehicles/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2 flex justify-between"
            onmouseenter="handleDropdownMenu('commercial-vehicles-dropdown-menu')"
            >Commercial Vehicles
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="#000000"
                viewBox="0 0 256 256"
              >
                <path
                  d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"
                ></path>
              </svg>
            </span>
          </a>
        </div>
        <div
          id="jute-dropdown-menu"
          class="hidden bg-white rounded-lg gap-3 absolute top-[50px] left-[500px] w-[270px] z-[1000] flex flex-col h-auto overflow-y-auto overflow-x-hidden"
        >
          <a
            href="https://ishankrishan.com/product-category/jute/jute-bag/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Jute Bag
          </a>
          <a
            href="https://ishankrishan.com/product-category/jute/jute-matt/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Jute Matt
          </a>
          <a
            href="https://ishankrishan.com/product-category/jute/jute-shopping-bag/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Jute Shopping Bag
          </a>
          <a
            href="https://ishankrishan.com/product-category/jute/jute-slipper/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Jute Slipper
          </a>
        </div>

        <div
          id="organic-dropdown-menu"
          class="hidden bg-white rounded-lg gap-3 absolute top-[100px] left-[500px] w-[270px] z-[1000] flex flex-col h-auto overflow-y-auto overflow-x-hidden"
        >
          <a
            href="https://ishankrishan.com/product-category/organic-products/cane-furniture/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Cane Furniture
          </a>
          <a
            href="https://ishankrishan.com/product-category/organic-products/bamboo-goods/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Bamboo Goods
          </a>
        </div>
        <div
          id="agricultural-machineries-dropdown-menu"
          class="hidden bg-white rounded-lg gap-3 absolute top-[150px] left-[500px] w-[270px] z-[1000] flex flex-col h-auto overflow-y-auto overflow-x-hidden"
        >
          <a
            href="https://ishankrishan.com/product-category/agricultural-machineries/power-tiller/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Power Tiller
          </a>
          <a
            href="https://ishankrishan.com/product-category/agricultural-machineries/straw-cutting-machine/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Straw Cutting Machine
          </a>
          <a
            href="https://ishankrishan.com/product-category/agricultural-machineries/mini-rice-mill-machine/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Mini Rice Mill Machine
          </a>
          <a
            href="https://ishankrishan.com/product-category/agricultural-machineries/other-agricultural-equipments/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Other Agricultural Equipments
          </a>
          <a
            href="https://ishankrishan.com/product-category/agricultural-machineries/agricultural-accessories/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Agricultural Accessories
          </a>
        </div>
        <div
          id="commercial-vehicles-dropdown-menu"
          class="hidden bg-white rounded-lg gap-3 absolute top-[250px] left-[500px] w-[270px] z-[1000] flex flex-col h-auto overflow-y-auto overflow-x-hidden"
        >
          <a
            href="https://ishankrishan.com/product-category/commercial-vehicles/mini-pick-up/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Mini Pick-Up
          </a>
          <a
            href="https://ishankrishan.com/product-category/commercial-vehicles/pick-up-accessories/"
            class="focus:outline-none focus:ring-2 focus:ring-cyan-950 text-black hover:bg-gray-100 rounded-md p-2"
            >Pick-Up Accessories
          </a>
        </div>
        <a
          href="https://ishankrishan.com/blog/"
          class="focus:outline-none focus:ring-2 focus:ring-cyan-950"
          >Blog</a
        >
        <a
          href="https://ishankrishan.com/sustainability/"
          class="focus:outline-none focus:ring-2 focus:ring-cyan-950"
          >Sustainability</a
        >
      </nav>
      <a
        href="https://ishankrishan.com/contact/"
        class="flex max-lg:hidden overflow-hidden gap-4 justify-center items-center py-2 pr-1.5 pl-5 my-auto text-2xl font-semibold leading-tight min-h-[58px] rounded-[50px] text-cyan-950 focus:outline-none focus:ring-2 focus:ring-cyan-950 bg-gradient-to-r from-[#00cd52] to-[#009d1d] text-white"
      >
        <span class="self-stretch my-auto">Contact Us</span>
        <img
          loading="lazy"
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/86ba6e60d115fa58e2d8bb5989bd2c3b265e56a91bf605de7b4042885e13e907?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
          alt=""
          class="object-contain shrink-0 self-stretch my-auto aspect-square rounded-[360px] w-[45px]"
        />
      </a>
      <button
        id="menuToggle"
        class="max-lg:block hidden px-5 relative"
        onclick="document.getElementById('mobileMenu').classList.remove('translate-x-full'); document.getElementById('mobileMenu').classList.add('translate-x-0')"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          fill="#ffffff"
          viewBox="0 0 256 256"
          id="menuToggle"
        >
          <path
            d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"
          ></path>
        </svg>
      </button>
      <div
        id="mobileMenu"
        class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-[1000000]"
      >
        <button onclick="toggleMenu()" class="absolute top-4 right-4">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            fill="#000000"
            viewBox="0 0 256 256"
          >
            <path
              d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"
            ></path>
          </svg>
        </button>
        <nav class="h-full flex flex-col justify-start pt-16">
          <a
            href="<?php echo esc_url(home_url('/')); ?>"
            class="px-6 py-4 text-gray-700 hover:bg-gray-100"
            >Home</a
          >
          <a
            href="https://ishankrishan.com/about-us/"
            class="px-6 py-4 text-gray-700 hover:bg-gray-100"
            >About Us</a
          >
          <div class="relative">
            <a
              href="#"
              class="px-6 py-4 text-gray-700 hover:bg-gray-100 flex justify-between items-center"
            >
              Products
              <svg
                class="w-4 h-4 transition-transform duration-200"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 5l7 7-7 7"
                ></path>
              </svg>
            </a>
            <div class="hidden pl-4">
              <a
                href="#"
                class="block px-6 py-2 text-gray-600 hover:bg-gray-100"
                >Jute</a
              >
              <a
                href="https://ishankrishan.com/product-category/organic-products/"
                class="block px-6 py-2 text-gray-600 hover:bg-gray-100"
                >Organic Goods</a
              >
              <a
                href="#"
                class="block px-6 py-2 text-gray-600 hover:bg-gray-100"
                >Agricultural Machineries</a
              >
              <a
                href="#"
                class="block px-6 py-2 text-gray-600 hover:bg-gray-100"
                >Commercial Vehicles</a
              >
            </div>
          </div>
          <a
            href="https://ishankrishan.com/blog/"
            class="px-6 py-4 text-gray-700 hover:bg-gray-100"
            >Blog</a
          >
          <a
            href="https://ishankrishan.com/sustainability/"
            class="px-6 py-4 text-gray-700 hover:bg-gray-100"
            >Sustainability</a
          >
          <a
            href="https://ishankrishan.com/contact/"
            class="mx-6 mt-4 bg-gradient-to-r from-[#00cd52] to-[#009d1d] text-white px-4 py-2 rounded-full text-center hover:bg-blue-700 transition-colors duration-300"
            >Contact Us</a
          >
        </nav>
      </div>
    </header>

  </body>
</html>
