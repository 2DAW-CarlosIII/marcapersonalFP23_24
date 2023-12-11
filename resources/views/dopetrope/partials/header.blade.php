<section id="header">


    <!-- Banner -->
    @include('dopetrope.partials.header.banner')

    <!-- Intro -->
    @if(Route::currentRouteName() == 'home')
        @include('dopetrope.partials.header.intro')

        <!-- Footer -->

        @include('dopetrope.partials.header.footer')
    @endif
</section>
