<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('sage/app.js', asset('scripts/app.js')->uri(), ['jquery'], null, true);

    wp_localize_script('sage/app.js', 'wootech_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
});
collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);
    
    add_action('wp_ajax_get_unsplash_images', 'get_unsplash_images');
    add_action('wp_ajax_nopriv_get_unsplash_images', 'get_unsplash_images');
    
    function get_unsplash_images() {
        $keyword = $_POST['keyword'];
        $url = "https://api.unsplash.com/search/photos?query={$keyword}&client_id=YOUR_ACCESS_KEY";
        $response = wp_remote_get($url);
        echo wp_remote_retrieve_body($response);
        wp_die();
    }   
    
    add_filter('woocommerce_checkout_fields', function($fields) {
        unset($fields['billing']['billing_company']);
        return $fields;
    });
    add_filter('woocommerce_default_address_fields', function($fields) {
        $fields['country']['priority'] = 45;
        return $fields;
    });
    add_action('after_setup_theme', function () {
        register_nav_menus([
            'primary_navigation' => __('Primary Navigation', 'sage'),
            'footer_navigation' => __('Footer Navigation', 'sage'),
        ]);
    });
    

    function register_acf_blocks() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type(array(
                'name'              => 'custom_element',
                'title'             => __('Custom Element'),
                'description'       => __('A customizable block with title, icon, tagline, description, and image.'),
                'render_template'   => get_template_directory() . '/template-parts/blocks/custom-element.php',
                'category'          => 'formatting',
                'icon'              => 'admin-site-alt3',
                'keywords'          => array( 'element', 'custom', 'acf' ),
                'enqueue_style'     => get_template_directory_uri() . '/assets/css/custom-block.css',
                'supports'          => array(
                    'align' => true
                )
            ));
        }
    }
    add_action('acf/init', 'register_acf_blocks');




    function create_testimonials_cpt() {
        $labels = array(
            'name'               => __('Testimonials'),
            'singular_name'      => __('Testimonial'),
            'menu_name'          => __('Testimonials'),
            'all_items'          => __('All Testimonials'),
            'add_new'            => __('Add New'),
            'add_new_item'       => __('Add New Testimonial'),
            'edit_item'          => __('Edit Testimonial'),
            'new_item'           => __('New Testimonial'),
            'view_item'          => __('View Testimonial'),
            'search_items'       => __('Search Testimonials'),
            'not_found'          => __('No Testimonials found'),
        );
    
        $args = array(
            'label'              => __('Testimonials'),
            'labels'             => $labels,
            'public'             => true,
            'has_archive'        => true,
            'menu_icon'          => 'dashicons-testimonial',
            'supports'           => array('title'),
            'show_in_rest'       => true,
        );
    
        register_post_type('testimonials', $args);
    }
    add_action('init', 'create_testimonials_cpt');
    

    function add_testimonial_metabox() {
        add_meta_box(
            'testimonial_meta_box',
            'Testimonial Details',
            'render_testimonial_metabox',
            'testimonials',
            'normal',
            'default'
        );
    }
    add_action('add_meta_boxes', 'add_testimonial_metabox');
    
    function render_testimonial_metabox($post) {
        $text = get_post_meta($post->ID, '_testimonial_text', true);
        $author_icon = get_post_meta($post->ID, '_testimonial_author_icon', true);
        $author_location = get_post_meta($post->ID, '_testimonial_author_location', true);
        $author_video = get_post_meta($post->ID, '_testimonial_author_video', true);
        ?>
    
        <p>
            <label for="testimonial_text"><strong>Testimonial Text:</strong></label>
            <textarea name="testimonial_text" id="testimonial_text" rows="4" style="width:100%;"><?php echo esc_textarea($text); ?></textarea>
        </p>
        
        <p>
            <label for="testimonial_author_icon"><strong>Author Icon:</strong></label><br>
            <input type="hidden" name="testimonial_author_icon" id="testimonial_author_icon" value="<?php echo esc_url($author_icon); ?>">
            <button type="button" class="button upload-image-button">Upload Image</button>
            <div class="image-preview">
                <?php if ($author_icon) : ?>
                    <img src="<?php echo esc_url($author_icon); ?>" width="80" height="80">
                <?php endif; ?>
            </div>
        </p>
        
        <p>
            <label for="testimonial_author_location"><strong>Author Location:</strong></label>
            <input type="text" name="testimonial_author_location" id="testimonial_author_location" value="<?php echo esc_attr($author_location); ?>" style="width:100%;">
        </p>
        
        <p>
            <label for="testimonial_author_video"><strong>Author Video:</strong></label><br>
            <input type="hidden" name="testimonial_author_video" id="testimonial_author_video" value="<?php echo esc_url($author_video); ?>">
            <button type="button" class="button upload-video-button">Upload Video</button>
            <div class="video-preview">
                <?php if ($author_video) : ?>
                    <video width="200" controls>
                        <source src="<?php echo esc_url($author_video); ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
            </div>
        </p>
    
        <script>
            jQuery(document).ready(function($) {
                function uploadMedia(buttonClass, inputField, previewContainer, fileType) {
                    $(document).on('click', buttonClass, function(e) {
                        e.preventDefault();
                        let button = $(this);
                        let fileFrame = wp.media({
                            title: 'Select ' + fileType,
                            library: { type: fileType },
                            button: { text: 'Use this ' + fileType },
                            multiple: false
                        });
    
                        fileFrame.on('select', function() {
                            let attachment = fileFrame.state().get('selection').first().toJSON();
                            $(inputField).val(attachment.url);
                            if (fileType === 'image') {
                                $(previewContainer).html('<img src="' + attachment.url + '" width="80" height="80">');
                            } else {
                                $(previewContainer).html('<video width="200" controls><source src="' + attachment.url + '" type="video/mp4"></video>');
                            }
                        });
    
                        fileFrame.open();
                    });
                }
    
                uploadMedia('.upload-image-button', '#testimonial_author_icon', '.image-preview', 'image');
                uploadMedia('.upload-video-button', '#testimonial_author_video', '.video-preview', 'video');
            });
        </script>
    
        <?php
    }
    
    function save_testimonial_meta($post_id) {
        if (isset($_POST['testimonial_text'])) {
            update_post_meta($post_id, '_testimonial_text', sanitize_textarea_field($_POST['testimonial_text']));
        }
        if (isset($_POST['testimonial_author_icon'])) {
            update_post_meta($post_id, '_testimonial_author_icon', esc_url($_POST['testimonial_author_icon']));
        }
        if (isset($_POST['testimonial_author_location'])) {
            update_post_meta($post_id, '_testimonial_author_location', sanitize_text_field($_POST['testimonial_author_location']));
        }
        if (isset($_POST['testimonial_author_video'])) {
            update_post_meta($post_id, '_testimonial_author_video', esc_url($_POST['testimonial_author_video']));
        }
    }
    add_action('save_post', 'save_testimonial_meta');
    


add_filter('woocommerce_checkout_fields', 'reorder_billing_fields');
function reorder_billing_fields($fields) {
    $fields['billing']['billing_country']['priority'] = 91; 
    return $fields;
}



// function wootech_move_cart_button() {
//     remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
//     add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 11); 
// }
// add_action('wp', 'wootech_move_cart_button');


function wootech_fetch_unsplash_images() {
    // Get keyword from AJAX request
    $keyword = sanitize_text_field($_POST['keyword']);

    if (!$keyword) {
        wp_send_json_error(['message' => 'Keyword is missing']);
    }

    // Unsplash API key (Replace with your own API key)
    $access_key = '7-6EUJXjjj8w43NG-PoBCRbEMmlm8MWcWJbvBgjNGGw';
    $api_url = "https://api.unsplash.com/search/photos?query=" . urlencode($keyword) . "&per_page=3&client_id=" . $access_key;

    // Fetch images
    $response = wp_remote_get($api_url);
    if (is_wp_error($response)) {
        wp_send_json_error(['message' => 'Failed to connect to Unsplash']);
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (empty($data['results'])) {
        wp_send_json_error(['message' => 'No images found']);
    }

    // Extract image URLs
    $images = [];
    foreach ($data['results'] as $result) {
        $images[] = $result['urls']['small'];
    }

    wp_send_json_success(['images' => $images]);
}
add_action('wp_ajax_wootech_fetch_unsplash_images', 'wootech_fetch_unsplash_images');
add_action('wp_ajax_nopriv_wootech_fetch_unsplash_images', 'wootech_fetch_unsplash_images');



function wootech_display_unsplash_images() {
    global $product;
    if (!$product) return;
    $keyword = get_field('product_splash', $product->get_id());

    if (!$keyword) return;

    ?>
    <div id="unsplash-images" class="unsplash-gallery" style="margin-top: 20px;">
        <h3>Related Images</h3>
        <div id="unsplash-container" style="display: flex; gap: 10px;"></div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        var keyword = "<?php echo esc_js($keyword); ?>";

        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: "POST",
            data: {
                action: "wootech_fetch_unsplash_images",
                keyword: keyword
            },
            success: function(response) {
                if (response.success) {
                    var imagesHtml = "";
                    $.each(response.data.images, function(index, imgUrl) {
                        imagesHtml += '<img src="' + imgUrl + '" style="width: 150px; height: auto; border-radius: 5px;"/>';
                    });
                    $("#unsplash-container").html(imagesHtml);
                } else {
                    console.log("No images found.");
                }
            }
        });
    });
    </script>
    <?php
}
add_action('woocommerce_before_single_product_summary', 'wootech_display_unsplash_images', 25);


