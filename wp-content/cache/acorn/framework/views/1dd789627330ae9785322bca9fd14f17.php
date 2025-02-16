<footer class="bg-blue-100 text-white py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
            <!-- Site Info -->
            <div class="w-full md:w-1/3">
                <p class="text-sm">&copy; <?php echo e(date('Y')); ?> <?php echo e(get_bloginfo('name')); ?>. All rights reserved.</p>
            </div>

            <!-- Footer Menu -->
            <nav class="w-full md:w-1/3 text-center">
                <?php if(has_nav_menu('footer_navigation')): ?>
                    <?php echo wp_nav_menu([
                        'theme_location' => 'footer_navigation',
                        'menu_class' => 'footer-menu flex justify-center space-x-4',
                        'container' => false,
                        'echo' => false
                    ]); ?>

                <?php endif; ?>
            </nav>

            <!-- Social Media Icons -->
            <div class="w-full md:w-1/3 text-right">
                <?php if(have_rows('social_links', 'option')): ?>
                    <div class="flex space-x-4 justify-end">
                        <?php $__currentLoopData = get_field('social_links', 'option'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($social['url']); ?>" target="_blank">
                                <img src="<?php echo e($social['icon']['url']); ?>" alt="<?php echo e($social['title']); ?>" class="w-6 h-6">
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH D:\xampp8_2\htdocs\sage\wp-content\themes\wootech\resources\views/partials/footer.blade.php ENDPATH**/ ?>