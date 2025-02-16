<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="hero relative bg-white">
    <img class="absolute top-0 left-0 h-full w-full object-cover" src="<?php echo e(get_template_directory_uri()); ?>/assets/images/home_banner.jpg" alt="hero">
    <div class="container relative">
        <h1 class="text-white text-4xl md:text-6xl">Revolutionizing Eye Surgery</h1>
    </div>
</div>

<!-- Dynamic WooCommerce Products -->
<?php
    $products = wc_get_products(['limit' => 2]);
?>
<div class="grid gap-10 sm:gap-20 md:gap-8 md:grid-cols-2">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(get_permalink($product->get_id())); ?>" class="product-card">
            <img src="<?php echo e(get_the_post_thumbnail_url($product->get_id())); ?>" alt="<?php echo e($product->get_name()); ?>">
            <h2><?php echo e($product->get_name()); ?></h2>
            <p><?php echo e($product->get_short_description()); ?></p>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Testimonials Section -->
<?php
    $testimonials = get_posts(['post_type' => 'testimonial', 'numberposts' => 5]);
?>
<?php if($testimonials): ?>
    <div class="testimonials">
        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h3>“<?php echo e(get_field('text', $testimonial->ID)); ?>”</h3>
            <p>- <?php echo e(get_field('author_name', $testimonial->ID)); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<!-- Partners Section -->
<?php if(have_rows('partners', 'option')): ?>
    <div class="partners">
        <?php $__currentLoopData = get_field('partners', 'option'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img src="<?php echo e($partner['partner_logo']['url']); ?>" alt="<?php echo e($partner['partner_logo']['alt']); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8_2\htdocs\sage\wp-content\themes\wootech\resources\views/front-page.blade.php ENDPATH**/ ?>