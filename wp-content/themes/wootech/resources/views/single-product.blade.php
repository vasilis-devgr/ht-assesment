{{--
The Template for displaying all single products

This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.

HOWEVER, on occasion WooCommerce will need to update template files and you
(the theme developer) will need to copy the new files to your theme to
maintain compatibility. We try to do this as little as possible, but it does
happen. When this occurs the version of the template file will be bumped and
the readme will list any important changes.

@see         https://docs.woocommerce.com/document/template-structure/
@package     WooCommerce\Templates
@version     1.6.4
--}}

@extends('layouts.app')

@section('content')
  <div class="container mx-auto px-4 py-6">
    @php
      do_action('get_header', 'shop');
      do_action('woocommerce_before_main_content');
    @endphp

    @while(have_posts())
      @php the_post(); @endphp
      <style>
    .product-container {
        display: flex;
        gap: 20px;
        align-items: flex-start;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden; /* Prevent content overflow */
    }
    .product-image {
        flex: 0 0 40%; /* Fixed width for image */
        max-width: 30%;
    }
    .product-details {
        flex: 1; /* Take remaining space */
    }
    .product-image img {
        width: 100%; /* Ensure image fits */
        height: auto;
        display: block;
    }
    form.cart {
    display: flex;
}
.cartwithprice {
    display: flex
;
    flex-direction: row;
    align-items: baseline;
}
</style>

<div class="product-container">
    <!-- Product Image (Left) -->
    <div class="product-image">
        {!! woocommerce_show_product_images() !!}
    </div>

    <!-- Product Details (Right) -->
    <div class="product-details">
        <h1 class="h3 fw-bold">{!! the_title() !!}</h1>
        <div class="cartwithprice">
        <p class="fs-5 text-muted mb-2">{!! woocommerce_template_single_price() !!}</p>
        <div class="mb-4">{!! woocommerce_template_single_add_to_cart() !!}</div>
        </div>
        <div class="mb-3">{!! woocommerce_template_single_excerpt() !!}</div>
        <div class="text-muted small">{!! woocommerce_template_single_meta() !!}</div>
    </div>
</div>

      <!-- Unsplash Related Images -->
      <div class="mt-8">
        <h3 class="text-xl font-semibold mb-3">Related Images</h3>
        <div id="unsplash-container" class="flex gap-4"></div>
      </div>

      <script>
      document.addEventListener("DOMContentLoaded", function() {
          var keyword = "{{ get_field('product_splash', get_the_ID()) }}";

          if (!keyword) return;

          fetch("{{ admin_url('admin-ajax.php') }}", {
              method: "POST",
              headers: {
                  "Content-Type": "application/x-www-form-urlencoded"
              },
              body: new URLSearchParams({
                  action: "wootech_fetch_unsplash_images",
                  keyword: keyword
              })
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  let imagesHtml = "";
                  data.data.images.forEach(imgUrl => {
                      imagesHtml += `<img src="${imgUrl}" class="w-32 h-auto rounded-lg shadow-md"/>`;
                  });
                  document.getElementById("unsplash-container").innerHTML = imagesHtml;
              }
          })
          .catch(error => console.error("Error fetching Unsplash images:", error));
      });
      </script>
    @endwhile

    @php
      do_action('woocommerce_after_main_content');
      do_action('get_sidebar', 'shop');
      do_action('get_footer', 'shop');
    @endphp
  </div>
@endsection