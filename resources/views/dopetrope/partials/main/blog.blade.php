<section>
    <header class="major">
        <h2>Documentación</h2>
    </header>
    <div class="row">
        <div class="col-6 col-12-small">
            <section class="box">
                <a href="#" class="image featured"><img src="{{ asset('/dopetrope/images/pic08.jpg') }}"
                        alt="" /></a>
                <header>
                    <h3>Gestión de proyectos</h3>
                </header>
                <p>En Marca Personal FP se permite la gestión de proyectos finales de fin de ciclo...</p>
                <footer>
                    <ul class="actions">
                        <li><a href="{{ action([App\Http\Controllers\CatalogController::class, 'getIndex']) }}" class="button icon solid fa-file-alt">Continue Reading</a></li>
                    </ul>
                </footer>
            </section>
        </div>
        <div class="col-6 col-12-small">
            <section class="box">
                <a href="#" class="image featured"><img src="{{ asset('/dopetrope/images/pic09.jpg') }}"
                        alt="" /></a>
                <header>
                    <h3>Gestión de currículos</h3>
                </header>
                <p>Marca Personal FP permite la gestión de los currículos del alumnado de Formación Profesional...</p>
                <footer>
                    <ul class="actions">
                        <li><a href="{{ action([App\Http\Controllers\TallerController::class, 'getIndex']) }}" class="button icon solid fa-file-alt">Continue Reading</a></li>
                    </ul>
                </footer>
            </section>
        </div>
    </div>
</section>
