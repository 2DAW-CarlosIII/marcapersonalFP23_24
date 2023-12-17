<section>
    <header>

        <div class="col-sm-4">
            @if ($user->avatar)
                <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" class="img-thumbnail">
            @else
                <img width="300" style="height:300px" alt="Curriculum-vitae-warning-icon"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
            @endif
        </div>
    </header>

    {{-- Formulario nuevo para avatar --}}
    <form action="{{ action([App\Http\Controllers\UserController::class, 'putEdit'], ['id' => $user->id]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Avatar">
        </div>
        <br>
        {{-- Avatar --}}
        <div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ 'Cambiar Avatar' }}</x-primary-button>
            </div>
        </div>

    </form>

</section>
