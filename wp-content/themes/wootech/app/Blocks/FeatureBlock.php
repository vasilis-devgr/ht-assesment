<section class="feature-block {{ get_field('position') }}">
    <div>
        <h3>{{ get_field('title') }}</h3>
        <p>{{ get_field('tagline') }}</p>
        <p>{{ get_field('description') }}</p>
        <a href="{{ get_field('learn_more_url') }}">Learn More</a>
    </div>
    <img src="{{ get_field('image') }}" alt="">
</section>
