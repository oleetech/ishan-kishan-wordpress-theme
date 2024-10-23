<?php
if ( !class_exists( 'Redux' ) ) {
    return;
}

// Set the opt_name argument to a unique identifier for your theme options.
$opt_name = "theme-setting";

$theme_options = array(
    'opt_name' => $opt_name,
    'dev_mode' => false,
    'use_cdn' => true,
    'display_name' => 'Ishan Kishan Theme Options',
    'display_version' => '1.0.0',
    // Add more settings fields as needed
);

Redux::setArgs( $opt_name, $theme_options );

Redux::setSection( $opt_name, array(
    'title'  => __('Basic Information Setup ', 'your-textdomain'),
    'id'     => 'basic',
    'desc'   => __('Basic settings for our theme.', 'your-textdomain'),
    'icon'   => 'el el-home',
    'fields' => array(

        array(
            'id'        => 'address',
            'type'      => 'text',
            'title'     => __('Address', 'your-textdomain'),
            'desc'      => __('Enter Your Address .', 'your-textdomain'),
            'default'   => 'Beverley, New York 224 US'
        ),
        array(
            'id'        => 'phone-number',
            'type'      => 'text',
            'title'     => __('Phone Number ', 'your-textdomain'),
            'desc'      => __('Enter Your Phone Number.', 'your-textdomain'),
            'default'   => '+880176797689'
        ),

        array(
            'id'        => 'email-address',
            'type'      => 'text',
            'title'     => __('Email Number ', 'your-textdomain'),
            'desc'      => __('Enter Your Email Number.', 'your-textdomain'),
            'default'   => 'info@ishankrishan.com'
        ),
        array(
            'id'        => 'website-url',
            'type'      => 'text',
            'title'     => __('Website URL', 'your-textdomain'),
            'desc'      => __('Enter Your Website URL.', 'your-textdomain'),
            'default'   => get_site_url(), // Set default to current site URL
        ),





        array(
            'id' => 'google_maps_iframe',
            'type' => 'textarea',
            'title' => __('Google Maps Iframe', 'your-textdomain'),
            'subtitle' => __('Enter the iframe code for Google Maps.', 'your-textdomain'),
            'desc' => __('You can get the iframe code from Google Maps. Ensure it is responsive if needed.', 'your-textdomain'),
            'default' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.227736756104!2d90.38698295091588!3d23.73925698451917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85c740f17d1%3A0xdd3daab8c90eb11f!2sCodexCoder!5e0!3m2!1sen!2sbd!4v1633410430100!5m2!1sen!2sbd" allowfullscreen=""></iframe>',
        ),


        // Add more fields as needed
    )
));

Redux::setSection($opt_name, array(
    'title'  => __('Social Media Links', 'your-textdomain'),
    'id'     => 'social_media',
    'desc'   => __('Settings for social media links.', 'your-textdomain'),
    'icon'   => 'el el-share',
    'fields' => array(
        array(
            'id'        => 'facebook_url',
            'type'      => 'text',
            'title'     => __('Facebook URL', 'your-textdomain'),
            'desc'      => __('Enter the Facebook URL.', 'your-textdomain'),
            'default'   => 'https://facebook.com',
        ),
        array(
            'id'        => 'linkedin_url',
            'type'      => 'text',
            'title'     => __('LinkedIn URL', 'your-textdomain'),
            'desc'      => __('Enter the LinkedIn URL.', 'your-textdomain'),
            'default'   => 'https://linkedin.com',
        ),


        array(
            'id'        => 'x_url',
            'type'      => 'text',
            'title'     => __('X (formerly Twitter) URL', 'your-textdomain'),
            'desc'      => __('Enter the X URL.', 'your-textdomain'),
            'default'   => 'https://twitter.com',
        ),        
        array(
            'id'        => 'instagram_url',
            'type'      => 'text',
            'title'     => __('Instagram URL', 'your-textdomain'),
            'desc'      => __('Enter the Instagram URL.', 'your-textdomain'),
            'default'   => 'https://instagram.com',
        ),


        array(
            'id'        => 'pinterest_url',
            'type'      => 'text',
            'title'     => __('Pinterest URL', 'your-textdomain'),
            'desc'      => __('Enter the Pinterest URL.', 'your-textdomain'),
            'default'   => 'https://pinterest.com',
        ),



    ),
));



Redux::setSection($opt_name, array(
    'title'  => __('Home Page', 'your-textdomain'),
    'id'     => 'home_page',
    'desc'   => __('Settings for the Home Page.', 'your-textdomain'),
    'icon'   => 'el el-home',
    'fields' => array()
));

// Hero Area Section
Redux::setSection($opt_name, array(
    'title'  => __('Hero Area', 'your-textdomain'),
    'id'     => 'home_page_hero_area',
    'desc'   => __('Settings for the Hero Area.', 'your-textdomain'),
    'subsection' => true,
    'fields' => array(
        array(
            'id'        => 'home_page_hero_title',
            'type'      => 'text',
            'title'     => __('Hero Title', 'your-textdomain'),
            'desc'      => __('Enter the title for the hero area.', 'your-textdomain'),
            'default'   => 'Empowering Agriculture, Nurturing Nature.',
        ),
        array(
            'id'        => 'home_page_hero_subtitle',
            'type'      => 'textarea',
            'title'     => __('Hero Subtitle', 'your-textdomain'),
            'desc'      => __('Enter the subtitle for the hero area.', 'your-textdomain'),
            'default'   => 'Your trusted partner for sustainable agro-based products and solutions.',
        ),
        array(
            'id'        => 'home_page_hero_button_text',
            'type'      => 'text',
            'title'     => __('Hero Button Text', 'your-textdomain'),
            'desc'      => __('Enter the button text for the hero area.', 'your-textdomain'),
            'default'   => 'Explore Our Products',
        ),
        array(
            'id'        => 'home_page_hero_slider_images',
            'type'      => 'gallery',
            'title'     => __('Hero Slider Images', 'your-textdomain'),
            'desc'      => __('Upload images for the hero slider.', 'your-textdomain'),
            'default'   => array(),
        ),
    )
));

// Why Choose Us Section
Redux::setSection($opt_name, array(
    'title'  => __('Why Choose Us', 'your-textdomain'),
    'id'     => 'home_page_why_choose_us',
    'desc'   => __('Settings for the Why Choose Us section.', 'your-textdomain'),
    'subsection' => true,
    'fields' => array(
        array(
            'id'        => 'home_page_why_choose_us_demo_field',
            'type'      => 'text',
            'title'     => __('Demo Field', 'your-textdomain'),
            'desc'      => __('This is a demo field for the Why Choose Us section. Add more fields as needed.', 'your-textdomain'),
            'default'   => 'Why Choose Us Content',
        ),
    )
));

// About Us Section
Redux::setSection($opt_name, array(
    'title'  => __('About Us', 'your-textdomain'),
    'id'     => 'home_page_about_us',
    'desc'   => __('Settings for the About Us section.', 'your-textdomain'),
    'subsection' => true,
    'fields' => array(
        array(
            'id'        => 'home_page_about_us_demo_field',
            'type'      => 'text',
            'title'     => __('Demo Field', 'your-textdomain'),
            'desc'      => __('This is a demo field for the About Us section. Add more fields as needed.', 'your-textdomain'),
            'default'   => 'About Us Content',
        ),
    )
));

// Sustainability Section
Redux::setSection($opt_name, array(
    'title'  => __('Sustainability', 'your-textdomain'),
    'id'     => 'home_page_sustainability',
    'desc'   => __('Settings for the Sustainability section.', 'your-textdomain'),
    'subsection' => true,
    'fields' => array(
        array(
            'id'        => 'home_page_sustainability_demo_field',
            'type'      => 'text',
            'title'     => __('Demo Field', 'your-textdomain'),
            'desc'      => __('This is a demo field for the Sustainability section. Add more fields as needed.', 'your-textdomain'),
            'default'   => 'Sustainability Content',
        ),
    )
));




// Main Section: About Us
Redux::setSection($opt_name, array(
    'title'  => __('About Us Page', 'your-textdomain'),
    'id'     => 'about_us',
    'desc'   => __('Settings for the About Us section.', 'your-textdomain'),
    'icon'   => 'el el-info',
));

// Subsection: Our Story
Redux::setSection($opt_name, array(
    'title'  => __('Our Story', 'your-textdomain'),
    'id'     => 'our_story',
    'subsection' => true,
    'desc'   => __('Settings for the Our Story section.', 'your-textdomain'),
    'fields' => array(
        array(
            'id'        => 'our_story_title',
            'type'      => 'text',
            'title'     => __('Our Story Title', 'your-textdomain'),
            'desc'      => __('Enter the title for the Our Story section.', 'your-textdomain'),
            'default'   => 'Our Story',
        ),
        array(
            'id'        => 'our_story_image',
            'type'      => 'media',
            'title'     => __('Our Story Image', 'your-textdomain'),
            'desc'      => __('Upload an image for the Our Story section.', 'your-textdomain'),
        ),
        array(
            'id'        => 'our_story_content',
            'type'      => 'textarea',
            'title'     => __('Our Story Content', 'your-textdomain'),
            'desc'      => __('Enter the content for the Our Story section.', 'your-textdomain'),
            'default'   => 'Ishan Krishan, a pioneer in the agro-based industry, was established in 2007...',
        ),
    )
));

// Subsection: Our Commitment
Redux::setSection($opt_name, array(
    'title'  => __('Our Commitment', 'your-textdomain'),
    'id'     => 'our_commitment',
    'subsection' => true,
    'desc'   => __('Settings for the Our Commitment section.', 'your-textdomain'),
    'fields' => array(
        array(
            'id'        => 'our_commitment_title',
            'type'      => 'text',
            'title'     => __('Our Commitment Title', 'your-textdomain'),
            'desc'      => __('Enter the title for the Our Commitment section.', 'your-textdomain'),
            'default'   => 'Leading Agro-based Company Dedicated to Providing Sustainable Solutions.',
        ),
        array(
            'id'        => 'our_commitment_image',
            'type'      => 'media',
            'title'     => __('Our Commitment Image', 'your-textdomain'),
            'desc'      => __('Upload an image for the Our Commitment section.', 'your-textdomain'),
        ),
        array(
            'id'        => 'our_commitment_content',
            'type'      => 'textarea',
            'title'     => __('Our Commitment Content', 'your-textdomain'),
            'desc'      => __('Enter the content for the Our Commitment section.', 'your-textdomain'),
            'default'   => 'We strive to empower farmers, promote environmental conservation...',
        ),
        array(
            'id'        => 'our_commitment_quality',
            'type'      => 'textarea',
            'title'     => __('Our Commitment Quality Text', 'your-textdomain'),
            'desc'      => __('Enter the first paragraph for the Our Commitment section.', 'your-textdomain'),
            'default'   => 'We prioritize quality in all our products, ensuring they meet the highest standards...',
        ),
        array(
            'id'        => 'our_commitment_community',
            'type'      => 'textarea',
            'title'     => __('Our Commitment Community Text', 'your-textdomain'),
            'desc'      => __('Enter the second paragraph for the Our Commitment section.', 'your-textdomain'),
            'default'   => 'We believe in giving back to the community and actively support local initiatives...',
        ),
        array(
            'id'        => 'our_commitment_sustainability',
            'type'      => 'textarea',
            'title'     => __('Our Commitment Sustainability', 'your-textdomain'),
            'desc'      => __('Enter the third paragraph for the Our Commitment section.', 'your-textdomain'),
            'default'   => 'We are committed to sustainable practices throughout our operations...',
        ),
    )
));

// Subsection: Our Mission
Redux::setSection($opt_name, array(
    'title'  => __('Our Mission', 'your-textdomain'),
    'id'     => 'our_mission',
    'subsection' => true,
    'desc'   => __('Settings for the Our Mission section.', 'your-textdomain'),
    'fields' => array(
        array(
            'id'        => 'our_mission_title',
            'type'      => 'text',
            'title'     => __('Our Mission Title', 'your-textdomain'),
            'desc'      => __('Enter the title for the Our Mission section.', 'your-textdomain'),
            'default'   => 'To Contribute to the Growth and Prosperity of Bangladesh\'s Agricultural Sector...',
        ),
        array(
            'id'        => 'our_mission_image',
            'type'      => 'media',
            'title'     => __('Our Mission Image', 'your-textdomain'),
            'desc'      => __('Upload an image for the Our Mission section.', 'your-textdomain'),
        ),
        array(
            'id'        => 'our_mission_content',
            'type'      => 'textarea',
            'title'     => __('Our Mission Content', 'your-textdomain'),
            'desc'      => __('Enter the content for the Our Mission section.', 'your-textdomain'),
            'default'   => 'Your mission goes here...',
        ),
    )
));



// Main Sustainability Page Section
Redux::setSection($opt_name, array(
    'title'  => __('Sustainability Page', 'your-textdomain'),
    'id'     => 'sustainability_page',
    'desc'   => __('Settings for the Sustainability Page.', 'your-textdomain'),
    'icon'   => 'el el-leaf',
));

// Main Title and Content Subsection
Redux::setSection($opt_name, array(
    'title'  => __('Main Content', 'your-textdomain'),
    'id'     => 'sustainability_main_content',
    'desc'   => __('Settings for the main content of the Sustainability section.', 'your-textdomain'),
    'subsection' => true,
    'fields' => array(
        // Main Title for Sustainability Section
        array(
            'id'        => 'sustainability_title',
            'type'      => 'text',
            'title'     => __('Sustainability Section Title', 'your-textdomain'),
            'desc'      => __('Enter the title for the Sustainability section.', 'your-textdomain'),
            'default'   => 'Our Commitment to Sustainability',
        ),
        // Main Content for Sustainability Section
        array(
            'id'        => 'sustainability_content',
            'type'      => 'textarea',
            'title'     => __('Sustainability Section Content', 'your-textdomain'),
            'desc'      => __('Enter the main content for the Sustainability section.', 'your-textdomain'),
            'default'   => 'We are dedicated to implementing sustainable practices across our operations...',
        ),
    )
));

// Subheadings Subsection
Redux::setSection($opt_name, array(
    'title'  => __('Subheadings', 'your-textdomain'),
    'id'     => 'sustainability_subheadings',
    'desc'   => __('Settings for the subheadings in the Sustainability section.', 'your-textdomain'),
    'subsection' => true,
    'fields' => array(
        // Subheading 1
        array(
            'id'        => 'sustainability_subheading_1',
            'type'      => 'text',
            'title'     => __('Sustainability Subheading 1', 'your-textdomain'),
            'desc'      => __('Enter the first subheading for the Sustainability section.', 'your-textdomain'),
            'default'   => 'Sustainable Sourcing',
        ),
        array(
            'id'        => 'sustainability_subcontent_1',
            'type'      => 'textarea',
            'title'     => __('Sustainability Subcontent 1', 'your-textdomain'),
            'desc'      => __('Enter the content for the first subheading.', 'your-textdomain'),
            'default'   => 'We ensure that all our raw materials are sourced from sustainable farms...',
        ),
        
        // Subheading 2
        array(
            'id'        => 'sustainability_subheading_2',
            'type'      => 'text',
            'title'     => __('Sustainability Subheading 2', 'your-textdomain'),
            'desc'      => __('Enter the second subheading for the Sustainability section.', 'your-textdomain'),
            'default'   => 'Eco-friendly Packaging',
        ),
        array(
            'id'        => 'sustainability_subcontent_2',
            'type'      => 'textarea',
            'title'     => __('Sustainability Subcontent 2', 'your-textdomain'),
            'desc'      => __('Enter the content for the second subheading.', 'your-textdomain'),
            'default'   => 'Our packaging materials are biodegradable and recyclable...',
        ),

        // Subheading 3
        array(
            'id'        => 'sustainability_subheading_3',
            'type'      => 'text',
            'title'     => __('Sustainability Subheading 3', 'your-textdomain'),
            'desc'      => __('Enter the third subheading for the Sustainability section.', 'your-textdomain'),
            'default'   => 'Community Engagement',
        ),
        array(
            'id'        => 'sustainability_subcontent_3',
            'type'      => 'textarea',
            'title'     => __('Sustainability Subcontent 3', 'your-textdomain'),
            'desc'      => __('Enter the content for the third subheading.', 'your-textdomain'),
            'default'   => 'We actively support local communities through various initiatives...',
        ),
    )
));

// Cards Subsection
Redux::setSection($opt_name, array(
    'title'  => __('Cards', 'your-textdomain'),
    'id'     => 'sustainability_cards',
    'desc'   => __('Settings for the cards in the Sustainability section.', 'your-textdomain'),
    'subsection' => true,
    'fields' => array(
        // Card 1: Jute
        array(
            'id'        => 'jute_card_title',
            'type'      => 'text',
            'title'     => __('Jute Card Title', 'your-textdomain'),
            'desc'      => __('Enter the title for the Jute card.', 'your-textdomain'),
            'default'   => 'Jute',
        ),

        array(
            'id'        => 'jute_card_content',
            'type'      => 'textarea',
            'title'     => __('Jute Card Content', 'your-textdomain'),
            'desc'      => __('Enter the content for the Jute card.', 'your-textdomain'),
            'default'   => 'Jute is a natural fiber, biodegradable and a sustainable resource...',
        ),

        // Card 2: Agricultural Machinery
        array(
            'id'        => 'agricultural_machinery_card_title',
            'type'      => 'text',
            'title'     => __('Agricultural Machinery Card Title', 'your-textdomain'),
            'desc'      => __('Enter the title for the Agricultural Machinery card.', 'your-textdomain'),
            'default'   => 'Agricultural Machinery',
        ),

        array(
            'id'        => 'agricultural_machinery_card_content',
            'type'      => 'textarea',
            'title'     => __('Agricultural Machinery Card Content', 'your-textdomain'),
            'desc'      => __('Enter the content for the Agricultural Machinery card.', 'your-textdomain'),
            'default'   => 'Our machinery reduces waste and improves productivity sustainably...',
        ),

        // Card 3: Organic Goods
        array(
            'id'        => 'organic_goods_card_title',
            'type'      => 'text',
            'title'     => __('Organic Goods Card Title', 'your-textdomain'),
            'desc'      => __('Enter the title for the Organic Goods card.', 'your-textdomain'),
            'default'   => 'Organic Goods',
        ),

        array(
            'id'        => 'organic_goods_card_content',
            'type'      => 'textarea',
            'title'     => __('Organic Goods Card Content', 'your-textdomain'),
            'desc'      => __('Enter the content for the Organic Goods card.', 'your-textdomain'),
            'default'   => 'We offer a range of organic products that promote health and sustainability...',
        ),
    )
));






// Check if Redux framework is available
// if ( class_exists( 'Redux' ) ) {
//     // Get the option value for email address
//     $email_address = Redux::getOption('theme-setting', 'email-address');
    
//     // Display the email address if it's set
//     if ( !empty($email_address) ) {
//         echo '<p>Email: ' . esc_html($email_address) . '</p>';
//     } else {
//         echo '<p>Email: Not set</p>';
//     }
// }
