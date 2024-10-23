<?php 

add_theme_support( 'automatic-feed-links' );//এই ফাংশন টা ব্যবহার করলে আরএসএস ফিড লিনক  এইচটিএমএল হেডে টাইটেলটা  অটো  যোগ  হয়ে যাবে 
add_theme_support( 'title-tag' );//এই  ফাংশন যোগ করলে এইচটিএমএল হেডে টাইটেলটা  অটো  যোগ  হয়ে যাবে
add_theme_support( 'post-thumbnails' );//এই ফাংশনটি যোগ করলে পোস্ট  এডিটর পোস্ট    থামনীলঅপশন এনাবল হবে
add_theme_support(         'html5',         array(             'comment-form',             'comment-list',             'gallery',             'caption',         )     );
add_theme_support(         'post-formats',         array(             'aside',             'image',             'video',             'quote',             'link',             'gallery',             'audio',         )     );//এই ফাংশনটি ব্যবহার মাধ্যমে পোস্ট ভিতরে কি কি ধরনের পোস্ট সাপোর্ট করবে তা দেখাবে
function themename_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 400,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

function my_theme_setup() {
    add_theme_support('custom-logo', array(
        'width'       => 200,
        'height'      => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'my_theme_setup');


// Enqueue stylesheets
function enqueue_theme_styles() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/styles/index.css');

    // Enqueue style.css
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}

// Hook into the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');



// Function to dequeue unwanted WordPress-provided scripts and styles
function dequeue_wordpress_defaults() {
    // Dequeue jQuery (if not needed)
    wp_deregister_script('jquery');

    // Remove default WordPress block CSS
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles'); // Remove global theme styles (introduced in WordPress 5.9)

    // Remove other WordPress default styles if any (like comment-reply, etc.)
    wp_dequeue_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'dequeue_wordpress_defaults', 100); // The higher priority ensures this runs after everything is enqueued

// Enqueue custom scripts and styles
function enqueue_theme_scripts() {
    // Enqueue custom JS
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/index.js', [], null, true);

    // Enqueue Swiper.js from CDN
    wp_enqueue_script('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
    // Enqueue featured swiper JS
    wp_enqueue_script('hero-section-home', get_template_directory_uri() . '/assets/js/hero-section-home.js', [], null, true);
    // Enqueue featured swiper JS
    wp_enqueue_script('featured-js', get_template_directory_uri() . '/assets/js/featured-swiper.js', [], null, true);
    // Enqueue featured drop down  JS hero-section-home
    wp_enqueue_script('dropdown', get_template_directory_uri() . '/assets/js/dropdown.js', [], null, true);
    // Enqueue custom CSS (if you have any)
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/style.css', [], null);
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');


function register_footer_menus() {
    register_nav_menus([
        'footer_menu_1' => __('Footer Menu 1', 'your-text-domain'),
        'footer_menu_2' => __('Footer Menu 2', 'your-text-domain'),
        'footer_menu_3' => __('Footer Menu 3', 'your-text-domain')
    ]);
}
add_action('init', 'register_footer_menus');


// Custom Walker Class for Footer Menu
class Footer_Menu_Walker extends Walker_Nav_Menu {
    // Start level (ul wrapper)
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="flex flex-col mt-6 text-xl font-medium">';
    }

    // End level (close ul)
    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</ul>';
    }

    // Start individual menu item (li and a tags)
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $class_names = '';
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        // Output the HTML for each menu item
        $output .= '<li class="mt-5"><a href="' . esc_url($item->url) . '" class="hover:underline">' . esc_html($item->title) . '</a></li>';
    }

    // End individual menu item
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}






if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/redux-framework/redux-core/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux-framework/redux-core/framework.php' );
}
include get_template_directory() . '/inc/theme-options.php';




function custom_html_section_meta_box() {
    add_meta_box(
        'custom_html_section',      // Unique ID
        'Custom HTML Section',      // Box title
        'custom_html_section_callback', // Content callback
        'page'                      // Post type
    );
}
add_action('add_meta_boxes', 'custom_html_section_meta_box');

function custom_html_section_callback($post) {
    // Add a nonce field for security
    wp_nonce_field('custom_html_section_nonce', 'custom_html_section_nonce_field');
    
    // Get the saved value if it exists
    $custom_html = get_post_meta($post->ID, '_custom_html_section', true);
    ?>
    <textarea name="custom_html_section" style="width:100%; height:200px;"><?php echo esc_textarea($custom_html); ?></textarea>
    <?php
}

function save_custom_html_section($post_id) {
    // Check if our nonce is set.
    if (!isset($_POST['custom_html_section_nonce_field'])) {
        return $post_id;
    }
    $nonce = $_POST['custom_html_section_nonce_field'];

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($nonce, 'custom_html_section_nonce')) {
        return $post_id;
    }

    // Check if the user has permission to save data.
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Save or delete the custom HTML section value.
    if (isset($_POST['custom_html_section'])) {
        update_post_meta($post_id, '_custom_html_section', $_POST['custom_html_section']);
    } else {
        delete_post_meta($post_id, '_custom_html_section');
    }
}
add_action('save_post', 'save_custom_html_section');

// Add custom fields to the product category form
add_action('product_cat_add_form_fields', 'add_custom_category_fields');
add_action('product_cat_edit_form_fields', 'edit_custom_category_fields');

function add_custom_category_fields() {
    ?>
    <div class="form-field">
        <label for="custom_section_title"><?php _e('Custom Section Title', 'your-text-domain'); ?></label>
        <input type="text" name="custom_section_title" id="custom_section_title" value="" />
    </div>
    <div class="form-field">
        <label for="custom_section_subheading"><?php _e('Custom Section Subheading', 'your-text-domain'); ?></label>
        <input type="text" name="custom_section_subheading" id="custom_section_subheading" value="" />
    </div>
    <div class="form-field">
        <label for="custom_section_content"><?php _e('Custom Section Content', 'your-text-domain'); ?></label>
        <textarea name="custom_section_content" id="custom_section_content"></textarea>
    </div>
    <div class="form-field">
        <label for="custom_gutenberg_content"><?php _e('Custom Gutenberg Content', 'your-text-domain'); ?></label>
        <?php
        wp_editor('', 'custom_gutenberg_content', array(
            'textarea_name' => 'custom_gutenberg_content',
            'media_buttons' => true,
            'tinymce' => array(
                'toolbar1' => 'bold,italic,underline,link,unlink',
                'toolbar2' => '',
                'toolbar3' => '',
                'toolbar4' => '',
            ),
        ));
        ?>
    </div>
    <div class="form-field">
        <label for="custom_html"><?php _e('Custom HTML', 'your-text-domain'); ?></label>
        <textarea name="custom_html" id="custom_html"></textarea>
    </div>
    <?php
}

function edit_custom_category_fields($term) {
    // Get the existing values
    $custom_section_title = get_term_meta($term->term_id, 'custom_section_title', true);
    $custom_section_subheading = get_term_meta($term->term_id, 'custom_section_subheading', true);
    $custom_section_content = get_term_meta($term->term_id, 'custom_section_content', true);
    $custom_gutenberg_content = get_term_meta($term->term_id, 'custom_gutenberg_content', true);
    $custom_html = get_term_meta($term->term_id, 'custom_html', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="custom_section_title"><?php _e('Custom Section Title', 'your-text-domain'); ?></label></th>
        <td>
            <input type="text" name="custom_section_title" id="custom_section_title" value="<?php echo esc_attr($custom_section_title); ?>" />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="custom_section_subheading"><?php _e('Custom Section Subheading', 'your-text-domain'); ?></label></th>
        <td>
            <input type="text" name="custom_section_subheading" id="custom_section_subheading" value="<?php echo esc_attr($custom_section_subheading); ?>" />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="custom_section_content"><?php _e('Custom Section Content', 'your-text-domain'); ?></label></th>
        <td>
            <textarea name="custom_section_content" id="custom_section_content"><?php echo esc_textarea($custom_section_content); ?></textarea>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="custom_gutenberg_content"><?php _e('Custom Gutenberg Content', 'your-text-domain'); ?></label></th>
        <td>
            <?php
            wp_editor($custom_gutenberg_content, 'custom_gutenberg_content', array(
                'textarea_name' => 'custom_gutenberg_content',
                'media_buttons' => true,
                'tinymce' => array(
                    'toolbar1' => 'bold,italic,underline,link,unlink',
                    'toolbar2' => '',
                    'toolbar3' => '',
                    'toolbar4' => '',
                ),
            ));
            ?>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="custom_html"><?php _e('Custom HTML', 'your-text-domain'); ?></label></th>
        <td>
            <textarea name="custom_html" id="custom_html"><?php echo esc_textarea($custom_html); ?></textarea>
        </td>
    </tr>
    <?php
}

// Save the custom fields
add_action('created_product_cat', 'save_custom_category_fields');
add_action('edited_product_cat', 'save_custom_category_fields');

function save_custom_category_fields($term_id) {
    if (isset($_POST['custom_section_title'])) {
        update_term_meta($term_id, 'custom_section_title', sanitize_text_field($_POST['custom_section_title']));
    }
    if (isset($_POST['custom_section_subheading'])) {
        update_term_meta($term_id, 'custom_section_subheading', sanitize_text_field($_POST['custom_section_subheading']));
    }
    if (isset($_POST['custom_section_content'])) {
        update_term_meta($term_id, 'custom_section_content', sanitize_textarea_field($_POST['custom_section_content']));
    }
    if (isset($_POST['custom_gutenberg_content'])) {
        update_term_meta($term_id, 'custom_gutenberg_content', wp_kses_post($_POST['custom_gutenberg_content']));
    }
    if (isset($_POST['custom_html'])) {
        update_term_meta($term_id, 'custom_html', wp_kses_post($_POST['custom_html']));
    }
}

