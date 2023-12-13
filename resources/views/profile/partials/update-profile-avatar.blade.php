<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Avatar') }}
        </h2>
    </header>

    <form action="{{ action([App\Http\Controllers\UserController::class, 'putAvatar'], ['id' => $user->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Avatar">
        </div>
        <div>
            @if ($user->avatar)
                <img width="300" style="height:300px" src="{{ Storage::url($user->avatar) }}" alt="Avatar"
                    class="img-thumbnail">
            @else
                <img width="300" style="height:300px" alt="Curriculum-vitae-warning-icon"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
            @endif

        </div>
        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Update Avatar') }}</x-primary-button>
        </div>
    </form>
</section>
