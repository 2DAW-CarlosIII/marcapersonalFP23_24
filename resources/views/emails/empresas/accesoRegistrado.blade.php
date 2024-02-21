<p>Se ha registrado un nuevo acceso a <strong>Marca Personal F.P.</strong></p>
<ul>
    <li>Cliente: {{ $_SERVER['HTTP_USER_AGENT'] }}</li>
    <li>Fecha/Hora: {{ \Carbon\Carbon::parse($_SERVER['REQUEST_TIME_FLOAT'])->toFormattedDateString() }}</li>
    <li>IP: {{ $_SERVER['REMOTE_ADDR'] }}</li>
</ul>
<p>Para visitarnos, por favor, haga clic en el siguiente enlace:
    <a href="{{ route('empresas.acceso', $empresa->token) }}">Registro en Marca Personal F.P.</a></p>
</p>
