<p>La empresa <strong>{{ $empresa->nombre }}</strong> está interesada en ver tu currículo</p>

<p>La información que tenemos de dicha empresa es la siguiente</p>
<ul>
    <li>Nombre: {{ $empresa->nombre }}</li>
    <li>NIF: {{ $empresa->nif }}</li>
</ul>

<p>Si <strong>aceptas</strong> que la empresa <strong>{{ $empresa->nombre }}</strong> vea tu currículo en pdf, haz click en el siguiente enlace:<br />
    <a href="{{ route('curriculos.autorizar', $curriculo->id) }}">
        Acepto compartir mi currículo con la empresa <strong>{{ $empresa->nombre }}</strong>
    </a>
</p>
