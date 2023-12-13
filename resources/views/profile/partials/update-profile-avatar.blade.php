<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Avatar') }}
        </h2>
    </header>

    <form method="POST" action="{{ action([App\Http\Controllers\UserController::class, 'putAvatar']) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Avatar">
        </div>
        <div>
            @if ($estudiante->avatar)
                <img src="{{ Storage::url($estudiante->avatar) }}" alt="Avatar" class="img-thumbnail">
            @else
                <img width="300" style="height:300px" alt="Curriculum-vitae-warning-icon"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
            @endif
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update Avatar') }}</x-primary-button>

            @if (session('status') === 'avatar-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
