<header class="bg-white border-b-4 border-gradient relative">
    <div class="container flex flex-wrap justify-between py-8">
        <!-- Logo -->
        <a href="<?php echo e(home_url('/')); ?>" class="flex">
            <?php if(has_custom_logo()): ?>
                <?php echo get_custom_logo(); ?>

            <?php else: ?>
                <h1 class="text-2xl font-bold"><?php echo e(get_bloginfo('name')); ?></h1>
            <?php endif; ?>
        </a>

        <!-- Navigation Menu -->
        <nav class="hidden md:flex space-x-6">
            <?php if(has_nav_menu('primary_navigation')): ?>
                <?php echo wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'nav-list',
                    'container' => false,
                    'echo' => false
                ]); ?>

            <?php endif; ?>
        </nav>

        <!-- WooCommerce Cart Icon -->
        <?php if(class_exists('WooCommerce')): ?>
            <div class="flex items-center">
                <a href="<?php echo e(wc_get_cart_url()); ?>" class="cart-icon relative">
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                        <path d="M3 3h2l3.6 7.59M7 13h10l4-8H5.4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="9" cy="20" r="1" stroke="currentColor" stroke-width="2"/>
                        <circle cx="16" cy="20" r="1" stroke="currentColor" stroke-width="2"/>
                    </svg>
                    <span class="absolute top-0 right-0 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                        <?php echo e(WC()->cart->get_cart_contents_count()); ?>

                    </span>
                </a>
            </div>
        <?php endif; ?>

        <!-- Mobile Menu Toggle -->
        <button class="md:hidden menu-toggler">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                <path d="M4 6h16M4 12h16m-7 6h7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>
</header>
<?php /**PATH D:\xampp8_2\htdocs\sage\wp-content\themes\wootech\resources\views/partials/header.blade.php ENDPATH**/ ?>