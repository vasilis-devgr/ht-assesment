<?php
add_action('acf/init', function () {
    acf_register_block_type([
        'name'            => 'home-banner',
        'title'           => __('Home Banner'),
        'render_template' => 'views/blocks/home-banner.blade.php',
        'category'        => 'layout',
        'icon'            => 'admin-comments',
        'mode'            => 'edit',
    ]);
});
