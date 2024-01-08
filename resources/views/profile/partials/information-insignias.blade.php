<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Insignias') }}
        </h2>
    </header>

    @foreach ($actividades as $actividad)

    <i class="{{$actividad->insignia}} fa-3x" style="margin-right: 10px" data-toggle="tooltip" data-placement="top" title="{{$actividad->nombre}}"> </i>

    @endforeach

</section>
