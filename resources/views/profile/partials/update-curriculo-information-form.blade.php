<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Curriculo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your curriculo.') }}
        </p>
    </header>


    <form action="{{ action([App\Http\Controllers\CurriculoController::class, 'putEdit'], ['id' => $user->id]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <br>
        <div class="form-group">
            <label for="curriculo">Curriculo</label>
            <input type="file" class="form-control" id="curriculo" name="curriculo" placeholder="Curriculo">
        </div>
        <br>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ 'Cambiar Curriculo' }}</x-primary-button>
        </div>
    </form>

</section>
