<?php
/**
 * Template Name: Custom Shop Page 
 */
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="format-detection" content="telephone=no">
	<title>Medical SA Product Card</title>
	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/sagotest/wp-content/themes/wootech/resources/assets/images/icons/apple-touch-icon.png">
    <link rel="alternate icon" type="image/png" sizes="32x32" href="http://localhost/sagotest/wp-content/themes/wootech/resources/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/svg+xml" sizes="16x16" href="http://localhost/sagotest/wp-content/themes/wootech/resources/assets/images/icons/favicon.svg">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" type="text/css" href="http://localhost/sagotest/wp-content/themes/wootech/resources/assets/css/slick.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/sagotest/wp-content/themes/wootech/resources/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/sagotest/wp-content/themes/wootech/resources/assets/css/aos.css">
</head>
<body>
@include('partials.header');
	<div class="breadcrumbs py-4 mb-10 lg:mb-20 text-xs font-light text-gray-300 border-b border-gray-400">
		<div class="container">
			<ul class="list-none flex">
				<li><a href="#" class="text-gray-300 hover:text-blue-100 hover:underline">Home</a></li>
							<li><span class="mx-4">/</span></li>
				<li class="text-gray-300">Shop Page</li>
			</ul>
		</div>
	</div><!-- /.breadcrumbs -->
	<main class="main flex flex-wrap justify-center gap-6 p-6">
    <?php
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 2, 
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $query = new WP_Query($args);
    ?>

    <?php if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); global $product; ?>
            <div class="max-w-sm bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Product Image -->
                <a href="<?php the_permalink(); ?>">
                    <img class="w-full h-56 object-cover" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>">
                </a>

                <!-- Product Content -->
                <div class="p-5">
                    <a href="<?php the_permalink(); ?>">
                        <h5 class="font-bold text-xl mb-2"><?php the_title(); ?></h5>
                    </a>
                    <p class="text-gray-600 text-sm mb-4">
                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                    </p>

                    <!-- Price + Add to Cart Button -->
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-gray-900"><?php echo $product->get_price_html(); ?></span>
                        <?php woocommerce_template_loop_add_to_cart(); ?>
                    </div>

                    <!-- Tags -->
                    <div class="pt-4">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#photography</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#travel</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#winter</span>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p class="text-center text-gray-600">No products found.</p>
    <?php endif; ?>
</main>




<!-- /.main -->
@include('partials.footer');

<button class="btn-back-top hidden fixed right-5 bottom-5 bg-white text-gray-100 rounded-lg text-center p-2 hover:bg-slate-100 hover:text-blue-100" type="button">
	<svg aria-hidden="true" focusable="false" width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M13.5 9.462L8.538 4.573L3.5 9.462" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
		<path d="M8.5 4.683V16.424" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
		<path d="M1 1H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
	</svg>
</button>

<script src="<?php echo get_template_directory_uri(); ?>/resources/assets/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/resources/assets/js/alpine.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/resources/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/resources/assets/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/resources/assets/js/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/resources/assets/js/script.js"></script>
</body>
</html>