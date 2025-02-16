<?php
add_action('init', function () {
    register_post_type('testimonial', [
        'labels' => [
            'name' => __('Testimonials'),
            'singular_name' => __('Testimonial'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
});
