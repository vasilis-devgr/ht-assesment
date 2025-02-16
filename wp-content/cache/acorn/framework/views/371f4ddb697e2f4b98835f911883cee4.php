<article <?php (post_class('h-entry')); ?>>
  <header>
    <h1 class="p-name">
      <?php echo $title; ?>

    </h1>

    <?php echo $__env->make('partials.entry-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </header>

  <div class="e-content">
    <?php (the_content()); ?>
  </div>

  <?php if($pagination): ?>
    <footer>
      <nav class="page-nav" aria-label="Page">
        <?php echo $pagination; ?>

      </nav>
    </footer>
  <?php endif; ?>

  <?php (comments_template()); ?>
</article>
<?php /**PATH D:\xampp8_2\htdocs\sage\wp-content\themes\wootech\resources\views/partials/content-single.blade.php ENDPATH**/ ?>