@extends('layouts.master')

@section('content')

<div>
    Esta es la vista del usuario {{ $usuario['nombre'] }}
    &nbsp;{{ $usuario['apellidos'] }}
<div>

@stop
