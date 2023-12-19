<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Curriculo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your curriculo.') }}
        </p>
    </header>


    <form action="{{ action([App\Http\Controllers\CurriculoController::class, 'putEdit'], ['id' => $curriculo->id]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <br>
        <div class="form-group">
            <label for="pdf_curriculum">Currículo</label>
            <input type="file" class="form-control" id="pdf_curriculum" name="pdf_curriculum" accept=".pdf" placeholder="pdf_curriculum">
        </div>
        <br>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ 'Cambiar Curriculo' }}</x-primary-button>
        </div>
    </form>

</section>
