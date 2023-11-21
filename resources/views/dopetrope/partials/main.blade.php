<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Proyectos -->
               @include('dopetrope.partials.main.proyectos')

               <!-- content -->
                <section>
                    <header class="major">
                        <h2>Content</h2>
                    </header>
                    <div class="row">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                </section>
                <!-- Portfolio -->
                    <section>
                        <header class="major">
                            <h2>My Portfolio</h2>
                        </header>
                        <div class="row">
                            <div class="col-4 col-6-medium col-12-small">
                                <section class="box">
                                    <a href="#" class="image featured"><img src="{{ asset('/dopetrope/images/pic02.jpg') }}" alt="" /></a>
                                    <header>
                                        <h3>Ipsum feugiat et dolor</h3>
                                    </header>
                                    <p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
                                    <footer>
                                        <ul class="actions">
                                            <li><a href="#" class="button alt">Find out more</a></li>
                                        </ul>
                                    </footer>
                                </section>
                            </div>
                            <div class="col-4 col-6-medium col-12-small">
                                <section class="box">
                                    <a href="#" class="image featured"><img src="{{ asset('/dopetrope/images/pic03.jpg') }}" alt="" /></a>
                                    <header>
                                        <h3>Sed etiam lorem nulla</h3>
                                    </header>
                                    <p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
                                    <footer>
                                        <ul class="actions">
                                            <li><a href="#" class="button alt">Find out more</a></li>
                                        </ul>
                                    </footer>
                                </section>
                            </div>
                            <div class="col-4 col-6-medium col-12-small">
                                <section class="box">
                                    <a href="#" class="image featured"><img src="{{ asset('/dopetrope/images/pic04.jpg') }}" alt="" /></a>
                                    <header>
                                        <h3>Consequat et tempus</h3>
                                    </header>
                                    <p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
                                    <footer>
                                        <ul class="actions">
                                            <li><a href="#" class="button alt">Find out more</a></li>
                                        </ul>
                                    </footer>
                                </section>
                            </div>
                            <div class="col-4 col-6-medium col-12-small">
                                <section class="box">
                                    <a href="#" class="image featured"><img src="{{ asset('/dopetrope/images/pic05.jpg') }}" alt="" /></a>
                                    <header>
                                        <h3>Blandit sed adipiscing</h3>
                                    </header>
                                    <p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
                                    <footer>
                                        <ul class="actions">
                                            <li><a href="#" class="button alt">Find out more</a></li>
                                        </ul>
                                    </footer>
                                </section>
                            </div>
                            <div class="col-4 col-6-medium col-12-small">
                                <section class="box">
                                    <a href="#" class="image featured"><img src="{{ asset('/dopetrope/images/pic06.jpg') }}" alt="" /></a>
                                    <header>
                                        <h3>Etiam nisl consequat</h3>
                                    </header>
                                    <p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
                                    <footer>
                                        <ul class="actions">
                                            <li><a href="#" class="button alt">Find out more</a></li>
                                        </ul>
                                    </footer>
                                </section>
                            </div>
                            <div class="col-4 col-6-medium col-12-small">
                                <section class="box">
                                    <a href="#" class="image featured"><img src="{{ asset('/dopetrope/images/pic07.jpg') }}" alt="" /></a>
                                    <header>
                                        <h3>Dolore nisl feugiat</h3>
                                    </header>
                                    <p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
                                    <footer>
                                        <ul class="actions">
                                            <li><a href="#" class="button alt">Find out more</a></li>
                                        </ul>
                                    </footer>
                                </section>
                            </div>
                        </div>
                    </section>

            </div>
            <div class="col-12">

                <!-- Blog -->
                @include('dopetrope.partials.main.blog')

            </div>
        </div>
    </div>
</section>
