<section class="partners">
    @foreach(get_field('partners', 'option') as $partner)
        <img src="{{ $partner['logo'] }}" alt="">
    @endforeach
</section>
