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
                        <h2>Usuarios registrados</h2>
                    </header>
                    <br>
                    <br>
                    <p style="font-size: 10em">
                        {{$userCount}}
                    </p>
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
