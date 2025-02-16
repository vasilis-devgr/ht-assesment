<?php

/**
 * Template Name: Frontpage
 */
 $home_banner = get_field('home_banner');
 $banner_title = get_field('banner_title');
 $section_image = get_field('section_1_image');
$section_title = get_field('section_1_title');
$section_subtitle = get_field('section_1_subtitle');
$section_description = get_field('section_1_description');
$section_image_2 = get_field('section_2_image');
$section_title_2 = get_field('section_2_title');
$section_subtitle_2 = get_field('section_2_subtitle');
$section_description_2 = get_field('section_2_description');
?>
<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
	<div class="hero relative bg-white">
	<div class="absolute top-0 left-0 w-full h-[330px] md:h-full">
    <?php if ($home_banner): ?>
        <img class="absolute top-0 left-0 h-full mx-auto object-cover w-full" src="<?php echo esc_url($home_banner['url']); ?>" width="1920" height="673" alt="<?php echo esc_attr($home_banner['alt']); ?>">
    <?php endif; ?>
    <div class="absolute top-0 left-0 right-0 h-full bg-gradient-to-r from-[rgba(0,0,0,0.35)] md:from-[rgba(0,0,0,0.65)] to-[rgba(0,0,0,0)]"></div>
</div>
		<div class="container relative">
			<div class="md:flex md:flex-col md:h-full pt-6 md:pt-14">
			<div class="xl:w-1/2 lg:w-2/3 md:w-3/4 md:max-w-none max-w-xs my-11 md:my-8 xl:my-12 2xl:my-28">
    <?php if ($banner_title): ?>
        <h1 class="text-white text-[28px] md:text-[40px] mb-10 leading-tight md:leading-snug" data-aos="fade-up" data-aos-duration="800">
            <?php echo esc_html($banner_title); ?>
        </h1>
    <?php endif; ?>
</div>
				<p class="text-base font-light text-white mb-8 2xl:mt-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">PRODUCTS</p>
				<?php
// WooCommerce products fetch karne ke liye WP_Query use karein
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 2, // Jitne products dikhane hain
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$query = new WP_Query($args);
?>

<div class="grid gap-10 sm:gap-20 md:gap-8 mb-8 md:-mb-[72px] md:grid-cols-2">
    <?php if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); global $product; ?>
            <a href="<?php the_permalink(); ?>" class="group flex flex-col relative bg-white bg-opacity-95 pt-4 md:pt-0 border-r-[10px] border-blue-100 shadow-xs" data-aos="fade-up" data-aos-delay="500" data-aos-duration="500">
                <img class="absolute -top-[23%] sm:-top-1/3 md:-top-1/4 right-1/2 sm:right-1/3 translate-x-1/2 md:translate-x-0 w-48 sm:w-2/4 px-2 md:px-0 md:w-auto md:right-14 md:ml-0"
                    src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" width="212" height="173" alt="<?php the_title(); ?>">
                <div class="py-6 px-5 md:py-6 md:px-8 pb-2 md:mb-4">
                    <h2 class="text-[32px] mt-4 md:mt-8 mb-4 group-hover:underline"><?php the_title(); ?></h2>
                    <p class="text-gray-100 font-light md:mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <p class="font-bold text-blue-200"><?php echo $product->get_price_html(); ?></p>
                </div>
                <div class="bg-white mt-auto">
                    <span class="flex items-center px-5 md:px-8 py-7 text-[13px] font-bold text-blue-200 group-hover:text-blue-100">
                        <svg class="text-red-50 mr-3 transition ease-out duration-100 group-hover:translate-x-1" aria-hidden="true" focusable="false" width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.962 1.412L12.851 6.374L7.962 11.412" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
                            <path d="M12.74 6.414H1" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
                        </svg>
                        More
                    </span>
                </div>
            </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>

			</div>
		</div>
	</div><!-- /.hero -->
	<main class="main bg-main-home md:pt-24 lg:pt-48">
		<div class="relative flex flex-col pt-14 pb-7 lg:py-0 lg:flex-col">
			<div class="inset-y-0 top-0 left-0 w-full mb-8 lg:mb-0 lg:w-1/2 lg:pr-4 lg:absolute" data-aos="fade-up" data-aos-duration="1000">
				<img class="object-cover w-full h-full" src="<?php echo esc_url($section_image['url']); ?>" width="960" height="400" alt="for physicians">
			</div>
			<div class="container flex flex-wrap justify-end">
				<div class="lg:w-1/2 lg:pl-16 lg:pr-3 lg:py-12" data-aos="fade-up" data-aos-duration="500">
					<div class="flex flex-wrap items-baseline text-blue-100">
						<h2>  <?php echo esc_html($section_title); ?></h2>
						<svg class="ml-4" aria-hidden="true" focusable="false" width="36" height="37" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 35.854V30.52C0.999088 29.1969 1.37473 27.9009 2.08305 26.7833C2.79136 25.6658 3.80308 24.7729 5 24.209L12.846 20.517L13.573 17.554" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M34.465 35.857V30.523C34.4659 29.1999 34.0903 27.9039 33.382 26.7864C32.6736 25.6688 31.6619 24.7759 30.465 24.212L22.619 20.52L21.873 17.574" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M20.411 18.4C24.189 16.781 24.603 13.364 25.011 10.006C25.3706 8.17921 25.1666 6.28625 24.426 4.57801C23.5785 3.08153 22.1912 1.96542 20.548 1.45801C18.7192 0.845945 16.7408 0.845945 14.912 1.45801C13.2687 1.96533 11.8814 3.08146 11.034 4.57801C10.2934 6.28625 10.0894 8.17921 10.449 10.006C10.86 13.363 11.275 16.781 15.049 18.4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M12.854 20.52C12.854 24.006 17.734 27.491 17.734 27.491C17.734 27.491 22.614 24.005 22.614 20.52" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M12.853 20.52C8.67 22.611 9.367 27.491 9.367 27.491" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M22.613 20.52C26.404 22.02 26.099 27.491 26.099 27.491V30.28" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M7.272 35.857H5.185V33.068C5.185 30.001 7.072 27.491 9.372 27.491C11.672 27.491 13.555 30.001 13.555 33.068V35.857H11.459" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M26.099 34.462C27.2538 34.462 28.19 33.5259 28.19 32.371C28.19 31.2162 27.2538 30.28 26.099 30.28C24.9442 30.28 24.008 31.2162 24.008 32.371C24.008 33.5259 24.9442 34.462 26.099 34.462Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<h3 class="text-blue-200 text-[22px] mb-7"><?php echo esc_html($section_subtitle); ?></h3>
					<p class="text-lg font-light mb-8"><?php echo esc_html($section_description); ?></p>
					<div class="py-2 mb-4">
						<a  class="linline-block px-8 py-4 text-[13px] font-bold transition duration-200 text-white hover:text-white focus:text-white bg-blue-100 hover:bg-blue-100 focus:bg-blue-100 hover:shadow-xs focus:shadow-xs focus:outline-none" href="#">Learn more</a>
					</div>
				</div>
			</div>
		</div>
		<div class="relative flex flex-col pt-14 pb-14 lg:py-0 lg:flex-col bg-white">
			<div class="inset-y-0 top-0 right-0 w-full mb-8 lg:mb-0 lg:w-1/2 lg:pl-4 lg:absolute" data-aos="fade-up" data-aos-duration="1000">
				<img class="object-cover object-left-top w-full h-full" src="<?php echo esc_url($section_image_2['url']); ?>" width="960" height="400" alt="for patients">
			</div>
			<div class="container flex flex-wrap justify-start">
				<div class="lg:w-1/2 lg:pr-8 lg:py-12" data-aos="fade-up" data-aos-duration="500">
					<div class="flex flex-wrap items-baseline text-blue-100">
						<h2> <?php echo esc_html($section_title_2); ?></h2>
						<svg class="ml-4" aria-hidden="true" focusable="false" width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M20.392 4.81C20.0178 4.81115 19.6445 4.84731 19.277 4.918C19.2943 5.06304 19.3033 5.20894 19.304 5.355C19.3056 5.92655 19.1783 6.49111 18.9314 7.00663C18.6846 7.52215 18.3247 7.97535 17.8785 8.33249C17.4322 8.68963 16.9112 8.94151 16.3541 9.06938C15.797 9.19724 15.2183 9.1978 14.661 9.071C14.2981 10.2764 14.3244 11.5655 14.7361 12.7552C15.1478 13.9448 15.924 14.9743 16.9545 15.6975C17.9849 16.4207 19.217 16.8007 20.4757 16.7834C21.7345 16.7662 22.9558 16.3526 23.966 15.6015C24.9762 14.8504 25.724 13.8 26.103 12.5996C26.482 11.3991 26.473 10.1098 26.0772 8.91474C25.6814 7.71972 24.9191 6.67985 23.8984 5.94295C22.8778 5.20605 21.6508 4.80962 20.392 4.81V4.81Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M20.392 1C22.9911 1 25.4838 2.0325 27.3216 3.87035C29.1595 5.70821 30.192 8.20088 30.192 10.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M10.594 10.798C10.5932 12.26 10.9203 13.7035 11.5513 15.0222C12.1823 16.341 13.1011 17.5014 14.24 18.418" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M28.283 18.418C31.2211 16.567 33.5795 13.9272 35.089 10.8C35.089 10.8 30.857 1 20.396 1C9.93501 1 5.69601 10.8 5.69601 10.8C5.69601 10.8 8.96201 17.876 14.241 18.42" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M1.341 26.038L4.604 24.409L10.047 33.118L7.328 34.747" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M15.493 25.495H22.019C22.596 25.495 23.1493 25.2658 23.5573 24.8578C23.9653 24.4498 24.1945 23.8965 24.1945 23.3195C24.1945 22.7425 23.9653 22.1892 23.5573 21.7812C23.1493 21.3732 22.596 21.144 22.019 21.144H13.549C12.6838 21.144 11.834 21.3731 11.086 21.808L5.13901 25.267" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M22.802 25.347L32.084 21.32C32.6175 21.0991 33.2169 21.0991 33.7503 21.3201C34.2838 21.5411 34.7076 21.965 34.9285 22.4985C35.1494 23.032 35.1494 23.6314 34.9284 24.1648C34.7073 24.6983 34.2835 25.1221 33.75 25.343L24.131 29.963C23.459 30.2475 22.7367 30.3941 22.007 30.394H13.147C12.7602 30.3945 12.3805 30.498 12.047 30.694L9.48199 32.202" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<h3 class="text-blue-200 text-[22px] mb-7"><?php echo esc_html($section_subtitle_2); ?></h3>
					<p class="text-lg font-light mb-8"><?php echo esc_html($section_description_2); ?></p>
					<div class="py-2 mb-4">
						<a  class="linline-block px-8 py-4 text-[13px] font-bold transition duration-200 text-white hover:text-white focus:text-white bg-blue-100 hover:bg-blue-100 focus:bg-blue-100 hover:shadow-xs focus:shadow-xs focus:outline-none" href="#">Learn more</a>
					</div>
				</div>
			</div>
		</div>
		<div class="bg-blue-200 md:border-b-[8rem] border-gray-400">
			<div class="container pt-16 pb-1">
				<div class="md:flex items-center justify-between pb-8 md:pb-16">
					<h2 class="text-white mb-4 md:mb-0" data-aos="fade-up">Latest News</h2>
					<a class="hidden md:flex-shrink-0 md:inline-block py-[14px] px-10 transition ease-in duration-200 text-[13px] font-bold border text-white border-white hover:bg-blue-100 focus:bg-blue-100 hover:text-white focus:text-white hover:border-blue-100 focus:border-blue-100 focus:outline-none" href="#" data-aos="fade-up" data-aos-delay="100">SEE ALL</a>
				</div>
				<div class="grid gap-8 row-gap-5 md:-mb-20 md:row-gap-8 md:grid-cols-3">
					<div class="relative flex flex-col bg-white px-6 py-8 sm:px-8 md:p-4 pb-2 lg:p-12 lg:pb-2 transition duration-300 hover:shadow-xs" data-aos="fade-up">
						<h3 class="text-[28px] font-semibold mb-16"><a class="text-blue-100 hover:underline" href="#">First eyeView implanted in Germany!</a></h3>
						<div class="flex items-center justify-between border-t border-gray-400 mt-auto py-7">
							<div class="text-gray-200 text-xs font-medium flex items-center pr-5">
								<svg class="inline-block mr-2" aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.998 20.996C16.5197 20.996 20.996 16.5197 20.996 10.998C20.996 5.47626 16.5197 1 10.998 1C5.47626 1 1 5.47626 1 10.998C1 16.5197 5.47626 20.996 10.998 20.996Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M14.189 12.398H9.999V7.598" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								24 Aug, 2022
							</div>
							<a class="absolute bottom-0 right-0 p-4 bg-red-50 hover:bg-red-500 text-white flex-shrink-0" href="#">
								<svg aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6 0V6H0V8H6V14H8V8H14V6H8V0H6Z" fill="currentColor"/>
								</svg>
							</a>
						</div>
					</div>
					<div class="relative flex flex-col bg-white px-6 py-8 sm:px-8 md:p-4 pb-2 lg:p-12 lg:pb-2 transition duration-300 hover:shadow-xs"  data-aos="fade-up" data-aos-delay="50">
						<h3 class="text-[28px] font-semibold mb-16"><a class="text-blue-100 hover:underline" href="#">Meet Medical SA at ESCS 2022!</a></h3>
						<div class="flex items-center justify-between border-t border-gray-400 mt-auto py-7">
							<div class="text-gray-200 text-xs font-medium flex items-center pr-5">
								<svg class="inline-block mr-2" aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.998 20.996C16.5197 20.996 20.996 16.5197 20.996 10.998C20.996 5.47626 16.5197 1 10.998 1C5.47626 1 1 5.47626 1 10.998C1 16.5197 5.47626 20.996 10.998 20.996Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M14.189 12.398H9.999V7.598" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								3 Sep, 2022
							</div>
							<a class="absolute bottom-0 right-0 p-4 bg-red-50 hover:bg-red-500 text-white flex-shrink-0" href="#">
								<svg aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6 0V6H0V8H6V14H8V8H14V6H8V0H6Z" fill="currentColor"/>
								</svg>
							</a>
						</div>
					</div>
					<div class="relative flex flex-col bg-white px-6 py-8 sm:px-8 md:p-4 pb-2 lg:p-12 lg:pb-2 transition duration-300 hover:shadow-xs"  data-aos="fade-up" data-aos-delay="100">
						<h3 class="text-[28px] font-semibold mb-16"><a class="text-blue-100 hover:underline" href="#">Medical SA gains popularity in series 2022</a></h3>
						<div class="flex items-center justify-between border-t border-gray-400 mt-auto py-7">
							<div class="text-gray-200 text-xs font-medium flex items-center pr-5">
								<svg class="inline-block mr-2" aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.998 20.996C16.5197 20.996 20.996 16.5197 20.996 10.998C20.996 5.47626 16.5197 1 10.998 1C5.47626 1 1 5.47626 1 10.998C1 16.5197 5.47626 20.996 10.998 20.996Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M14.189 12.398H9.999V7.598" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								24 Nov, 2022
							</div>
							<a class="absolute bottom-0 right-0 p-4 bg-red-50 hover:bg-red-500 text-white flex-shrink-0" href="#">
								<svg aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6 0V6H0V8H6V14H8V8H14V6H8V0H6Z" fill="currentColor"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
				<div class="text-center md:hidden py-8">
					<a class="flex-shrink-0 inline-block py-[14px] px-10 transition ease-in duration-200 text-[13px] font-bold border text-white border-white hover:bg-blue-100 focus:bg-blue-100 hover:text-white focus:text-white hover:border-blue-100 focus:border-blue-100 focus:outline-none" href="#">SEE ALL</a>
				</div>
			</div>
		</div>
		<div class="relative">
			<img class="absolute inset-0 object-cover w-full h-full" src="<?php echo get_template_directory_uri(); ?>/resources/assets/images/bg_get_in_touch.jpg" width="1920" height="250" alt="get in touch">
			<div class="relative bg-opacity-50 bg-gray-100 py-10 md:py-14">
				<div class="container text-center pb-3">
					<h2 class="text-white mb-10" data-aos="zoom-in">Get in touch</h2>
					<a class="inline-block px-8 py-4 text-[13px] font-bold transition duration-200 text-blue-100 hover:text-white focus:text-white bg-blue-300 hover:bg-blue-100 focus:bg-blue-100 hover:shadow-xs focus:shadow-xs focus:outline-none" href="contact.html" data-aos="fade-up" data-aos-delay="100">Contact Us</a>
				</div>
			</div>
		</div>
		<div class="container pt-10 pb-6 md:pt-14 md:pb-8">
			<h2 class="text-center text-gray-100" data-aos="fade-up">Our Partners</h2>
			<div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-5 py-8">
				<div class="flex items-center justify-center lg:justify-start p-6 lg:pl-0 grayscale hover:grayscale-0" data-aos="fade-up" data-aos-duration="1000">
					<img src="<?php echo get_template_directory_uri(); ?>/resources/assets/images/partners/logo_swiss_visio.png" width="210" height="90" alt="swiss visio">
				</div>
				<div class="flex items-center justify-center p-6 grayscale hover:grayscale-0" data-aos="fade-up" data-aos-duration="1000">
					<img src="<?php echo get_template_directory_uri(); ?>/resources/assets/images/partners/logo_epfl.png" width="140" height="42" alt="EPFL">
				</div>
				<div class="flex items-center justify-center p-6 grayscale hover:grayscale-0" data-aos="fade-up" data-aos-duration="1000">
					<img src="<?php echo get_template_directory_uri(); ?>/resources/assets/images/partners/logo_canton_de_vaud.png" width="188" height="58" alt="canton de vaud">
				</div>
				<div class="flex items-center justify-center p-6 grayscale hover:grayscale-0" data-aos="fade-up" data-aos-duration="1000">
					<img src="<?php echo get_template_directory_uri(); ?>/resources/assets/images/partners/logo_fit.png" width="210" height="65" alt="fit">
				</div>
				<div class="flex items-center justify-center lg:justify-end p-6 lg:pr-0 grayscale hover:grayscale-0" data-aos="fade-up" data-aos-duration="1000">
					<img src="<?php echo get_template_directory_uri(); ?>/resources/assets/images/partners/logo_schweizerische.png" width="251" height="63" alt="schweizerische">
				</div>
			</div>
		</div>
	</main><!-- /.main -->
	<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

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
</html><?php /**PATH G:\wamp64\www\sagotest\wp-content\themes\wootech\resources\views/front-page.blade.php ENDPATH**/ ?>