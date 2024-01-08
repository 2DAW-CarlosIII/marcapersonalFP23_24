<header>
    <!--Avatar-->
    @if ($user->avatar)
        <img width="200" style="height:200px" src="{{ Storage::url($user->avatar) }}" alt="Avatar"
            class="img-thumbnail">
    @else
        <img width="200" style="height:200px" alt="Curriculum-vitae-warning-icon"
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png"
            class="img-thumbnail">
    @endif
</header>

<h2 class="text-lg font-medium text-gray-900">
    {{ __('Change Avatar') }}
</h2>

<form action="{{ action([App\Http\Controllers\UserController::class, 'putEdit'], ['id' => $user->id]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <br>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Avatar">
    </div>
    <br>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ 'SAVE' }}</x-primary-button>
    </div>
</form>
