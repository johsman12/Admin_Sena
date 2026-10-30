@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mi Panel de Aprendiz</h2>
    <p>Bienvenido, {{ auth()->user()->name }}</p>

    <div class="card mt-4">
        <div class="card-header">Detalles de mi inscripción</div>
        <div class="card-body">
            <p><strong>Ficha / Curso:</strong> {{ $infoAprendiz->curso->nombre ?? 'No asignado' }}</p>
            <p><strong>Centro de Formación:</strong> {{ $infoAprendiz->curso->centro->nombre ?? 'No asignado' }}</p>
            <p><strong>Computador Asignado:</strong> {{ $infoAprendiz->computador->serial ?? 'Ninguno' }}</p>
            <p><strong>Área:</strong> {{ $infoAprendiz->area->nombre ?? 'No asignada' }}</p>
        </div>
    </div>
</div>
@endsection