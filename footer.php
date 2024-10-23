


    <footer class="flex overflow-hidden flex-col bg-white mt-32">
      <div
        class="flex flex-wrap justify-between gap-14 items-start px-10 pt-20 pb-32 w-full bg-white text-cyan-950 max-md:px-5 max-md:pb-24 max-md:max-w-full"
      >
        <div class="flex flex-col">
          <div class="flex flex-col w-full">
            <h2
              class="flex gap-6 max-w-full text-5xl font-bold leading-tight text-white w-[272px] max-md:text-4xl"
            >
            <?php
// Check if custom logo is set
if (function_exists('the_custom_logo') && has_custom_logo()) {
    // Get the custom logo URL
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo_url = wp_get_attachment_image_src($custom_logo_id, 'full')[0];

    // Display the custom logo with attributes
    echo '<img loading="lazy" src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '" class="object-contain fill-[linear-gradient(267deg,#20DB81_0%,#97F85B_32.19%,#97F85B_66.98%,#25DC80_99.69%)] w-[200px]" />';
} else {
    // Fallback to default logo from theme directory
    echo '<img loading="lazy" src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="Site Logo" class="object-contain fill-[linear-gradient(267deg,#20DB81_0%,#97F85B_32.19%,#97F85B_66.98%,#25DC80_99.69%)] w-[200px]" />';
}
?>

            </h2>
            <p class="mt-5 text-xl font-medium leading-6 text-black">
              Empowering Agriculture, <br />
              Nurturing Nature.
            </p>
          </div>
          <?php
// Fetch Redux options for social media URLs and image URLs
$facebook_url = Redux::getOption('theme-setting', 'facebook_url');

$linkedin_url = Redux::getOption('theme-setting', 'linkedin_url');

$twitter_url = Redux::getOption('theme-setting', 'x_url');
?>


<nav class="flex gap-6 items-center self-start mt-12 max-md:mt-10">
    <?php if (!empty($facebook_url)) : ?>
        <a href="<?php echo esc_url($facebook_url); ?>" aria-label="Facebook">
            <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c4986726a9141a9990a90f08903ef580046f519c1a5967c823cb5b1272a5672a?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                alt="Facebook"
                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square invert"
            />
        </a>
    <?php endif; ?>

    <?php if (!empty($linkedin_url)) : ?>
        <a href="<?php echo esc_url($linkedin_url); ?>" aria-label="LinkedIn">
            <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/98bac506a49b4c70030d25a37df6cf351e9344c4b106fab61751a7bb40acc1e6?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                alt="LinkedIn"
                class="object-contain shrink-0 self-stretch my-auto aspect-square w-[27px] invert"
            />
        </a>
    <?php endif; ?>

    <?php if (!empty($twitter_url)) : ?>
        <a href="<?php echo esc_url($twitter_url); ?>" aria-label="Twitter">
            <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/0bf396a788e9810289790cd753bd53acf8c60fbfce69012439707ef67e77ece5?placeholderIfAbsent=true&apiKey=b4a8ab3a36b64f37ac7ab8ff748f0eba"
                alt="Twitter"
                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square invert"
            />
        </a>
    <?php endif; ?>
</nav>




        </div>
        <nav class="flex flex-col leading-tight text-black">
    <h3 class="text-2xl font-semibold">Company</h3>
    <?php
    wp_nav_menu([
        'theme_location' => 'footer_menu_1',
        'container' => false,
        'menu_class' => 'flex flex-col mt-2 text-xl font-medium',
        'walker' => new Footer_Menu_Walker()
    ]);
    ?>
</nav>
<nav class="flex flex-col max-md:ml-0 max-md:w-full">
    <div class="flex flex-col leading-tight text-black max-md:mt-10">
        <h3 class="text-2xl font-semibold">Products</h3>
        <?php
        wp_nav_menu([
            'theme_location' => 'footer_menu_2',
            'container' => false,
            'menu_class' => 'flex flex-col mt-2 text-xl font-medium',
            'walker' => new Footer_Menu_Walker()
        ]);
        ?>
    </div>
</nav>


        
        <div class="flex flex-col max-md:ml-0 max-md:w-full">
          <div class="flex flex-col leading-tight text-black max-md:mt-10">
            <h3 class="text-2xl font-semibold">Contact Us</h3>
            <address
              class="flex flex-col mt-6 text-xl font-medium whitespace-nowrap not-italic"
            >
            <?php
// Check if Redux framework is available
if ( class_exists( 'Redux' ) ) {
    // Get the option value for email address
    $email_address = Redux::getOption('theme-setting', 'email-address');
}
?>

<a href="mailto:<?php
    // Display the email address in the href attribute if it's set
    if ( !empty($email_address) ) {
        echo esc_html($email_address);
    } else {
        echo '#';
    }
?>" class="hover:underline">
    <?php
    // Display the email address as link text if it's set
    if ( !empty($email_address) ) {
        echo ' ' . esc_html($email_address);
    } else {
        echo 'Email: Not set';
    }
    ?>
</a>
              <?php
// Check if Redux framework is available
if ( class_exists( 'Redux' ) ) {
    // Get the option value for phone number
    $phone_number = Redux::getOption('theme-setting', 'phone-number');
}
?>

<a href="tel:<?php
    // Display the phone number in the href attribute if it's set
    if ( !empty($phone_number) ) {
        echo esc_html($phone_number);
    } else {
        echo '#';
    }
?>" class="mt-5 hover:underline">
    <?php
    // Display the phone number as link text if it's set
    if ( !empty($phone_number) ) {
        echo esc_html($phone_number);
    } else {
        echo 'Phone: Not set';
    }
    ?>
</a>
            </address>
          </div>
        </div>
        <div class="flex flex-col max-md:ml-0 max-md:w-full">
          <form
            class="flex flex-col gap-6 w-full font-semibold leading-tight max-md:mt-10"
          >
            <label for="email-subscribe" class="text-2xl text-black"
              >Subscribe for any updates</label
            >
            <div class="flex gap-4 max-md:flex-wrap">
              <input
                type="email"
                id="email-subscribe"
                placeholder="Your Email"
                class="overflow-hidden grow shrink gap-2.5 self-stretch px-7 py-3 text-xl font-medium bg-black min-h-[61px] min-w-[240px] rounded-[50px] text-white w-[226px] max-md:px-5"
                required
              />
              <button
                type="submit"
                class="overflow-hidden self-stretch px-5 py-3 text-2xl whitespace-nowrap rounded-[50px] text-cyan-950 bg-gradient-to-r from-[#00cd52] to-[#009d1d] hover:bg-gray-100"
              >
                Subscribe
              </button>
            </div>
          </form>
        </div>
      </div>
    </footer>    

    <?php wp_footer(); ?>
  </body>
</html>
