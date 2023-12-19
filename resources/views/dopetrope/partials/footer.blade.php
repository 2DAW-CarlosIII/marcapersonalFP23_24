<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-8 col-12-medium">
                <!-- Últimos -->
                @include('dopetrope.partials.footer.ultimos')
            </div>
            <div class="col-4 col-12-medium">
                <!-- Info MarcaPersonalFP -->
                @include('dopetrope.partials.footer.mpinfo')
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <section>
                    <header>
                        <h2>Tempus consequat</h2>
                    </header>
                    <ul class="divided">
                        <li><a href="#">Lorem ipsum dolor sit amet sit veroeros</a></li>
                        <li><a href="#">Sed et blandit consequat sed tlorem blandit</a></li>
                        <li><a href="#">Adipiscing feugiat phasellus sed tempus</a></li>
                        <li><a href="#">Hendrerit tortor vitae mattis tempor sapien</a></li>
                        <li><a href="#">Sem feugiat sapien id suscipit magna felis nec</a></li>
                        <li><a href="#">Elit class aptent taciti sociosqu ad litora</a></li>
                    </ul>
                </section>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <section>
                    <header>
                        <h2 style="text-align: center">Proyectos almacenados</h2>
                    </header>
                    <ul class="divided">
                        @php
                            $proyectos=\App\Models\Proyecto::contarProyectos();
                        @endphp
                            <li style="text-align: center"><a href="/catalog" style="font-size: 10em">{{$proyectos}}</a></li>


                    </ul>
                </section>
            </div>
            <div class="col-4 col-12-medium">
                <!-- Info CIFP Carlos III -->
                @include('dopetrope.partials.footer.c3info')
            </div>
            <div class="col-12">

                <!-- Copyright -->
                    <div id="copyright">
                        <ul class="links">
                            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                        </ul>
                    </div>

            </div>
        </div>
    </div>
</section>
