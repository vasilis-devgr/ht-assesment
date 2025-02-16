@php
    $product1 = wc_get_product(get_field('product_1'));
    $product2 = wc_get_product(get_field('product_2'));
@endphp

<section class="banner">
    <div>
        <h2>{{ $product1->get_name() }}</h2>
        <p>{{ $product1->get_short_description() }}</p>
        <img src="{{ get_the_post_thumbnail_url($product1->get_id()) }}" alt="">
    </div>
    <div>
        <h2>{{ $product2->get_name() }}</h2>
        <p>{{ $product2->get_short_description() }}</p>
        <img src="{{ get_the_post_thumbnail_url($product2->get_id()) }}" alt="">
    </div>
</section>
