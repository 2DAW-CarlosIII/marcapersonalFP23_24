<section id="header" style="padding: 0px">

    @include('partials.navbar')

    <!-- Banner -->
    @include('dopetrope.partials.header.banner')

    <!-- Intro -->
    @if(Route::currentRouteName() == 'home')
        @include('dopetrope.partials.header.intro')

        <!-- Footer -->

        @include('dopetrope.partials.header.footer')
    @endif
</section>
