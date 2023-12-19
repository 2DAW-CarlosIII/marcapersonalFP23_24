<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Insignias') }}
        </h2>
    </header>

    @foreach ($insignias as $insignia)

    <i class="{{$insignia}} fa-3x"></i>

    @endforeach

</section>
