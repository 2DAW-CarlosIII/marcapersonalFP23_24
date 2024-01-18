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
                <section style="text-align: center">
                    <header>
                        <h2>Usuarios registrados</h2>
                    </header>
                    <br>
                    <br>
                    <p style="font-size: 10em;">
                        {{ \App\Models\User::count() }}
                    </p>
                </section>
            </div>
            <div class="col-4 col-6-medium col-12-small mt-sm-5 mt-md-0">
                <section>
                    <header>
                        <h2 style="text-align: center">Proyectos almacenados</h2>
                    </header>
                    <ul class="divided">
                        @php
                            $proyectos=\App\Models\Proyecto::contarProyectos();
                        @endphp
                            <li style="text-align: center"> <br><br><a href="/catalog" style="font-size: 10em;text-decoration:none">{{$proyectos}}</a></li>

                    </ul>
                </section>
            </div>
            <div class="col-4 col-12-medium mt-0">
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
