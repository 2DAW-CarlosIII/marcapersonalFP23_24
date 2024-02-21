<p>El estudiante <strong>{{ $curriculo->user->nombre }} {{ $curriculo->user->apellidos }}</strong>
    ha autorizado a la empresa {{ $empresa->nombre }} para la descarga de su currículo.</p>

<p>Para comenzar la descarga, pulse click en el siguiente enlace:<br />
    <a href="{{ route('curriculos.getCurriculoByMd5', [$curriculo->id, $curriculo->getMd5FileFromPdfCurriculum()]) }}">
        Descargar curriculo de <strong>{{ $curriculo->user->nombre }} {{ $curriculo->user->apellidos }}</strong>
    </a>
</p>

<p>Para visitarnos, por favor, haga clic en el siguiente enlace:
    <a href="{{ route('empresas.acceso', $empresa->token) }}">Registro en Marca Personal F.P.</a></p>
</p>
