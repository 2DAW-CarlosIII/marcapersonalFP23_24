<p>Uno de nuestros docentes considera que le podría interesar conocer la página web <strong>Marca Personal F.P.</strong>
    que le ayudará a encontrar los profesionales cuyas competencias mejor se adaptan a las necesidades de su empresa.</p>
<ul>
    <li>Nombre: {{ $empresa->nombre }}</li>
    <li>Correo electrónico: {{ $empresa->email }}</li>
</ul>
<p>Para visitarnos, por favor, haga clic en el siguiente enlace:
    <a href="{{ route('empresas.acceso', $empresa->token) }}">Registro en Marca Personal F.P.</a></p>
</p>
