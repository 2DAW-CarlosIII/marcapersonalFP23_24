<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Actualizar curriculo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Actualiza tu curriculo.') }}
        </p>
    </header>


    <form action="{{ action([App\Http\Controllers\CurriculoController::class, 'putEdit'], ['id' => $curriculo->id]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <br>
        <div class="form-group">
            <label for="pdf_curriculum">Currículo</label>
            <input type="file" class="form-control" id="pdf_curriculum" name="pdf_curriculum" accept=".pdf">
        </div>
        <br>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ 'Cambiar Curriculo' }}</x-primary-button>
        </div>
    </form>

</section>
