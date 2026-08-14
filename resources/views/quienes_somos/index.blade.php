@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-success">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">¿Quiénes Somos? - AdminSENA</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-success fw-bold mb-3">Nuestra Institución</h4>
                    <p class="text-muted">
                        El Servicio Nacional de Aprendizaje (SENA) se encarga de cumplir la función que le corresponde al Estado de invertir en el desarrollo social y técnico de los trabajadores colombianos, ofreciendo y ejecutando la formación profesional integral.
                    </p>

                    <hr class="my-4">

                    <h4 class="text-success fw-bold mb-3">Sobre AdminSENA</h4>
                    <p class="text-muted">
                        <strong>AdminSENA</strong> es un sistema de gestión académica y administrativa desarrollado para optimizar el control de áreas, centros de formación, equipos de cómputo, cursos, instructores y aprendices.
                    </p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border">
                                <h5 class="text-success fw-bold">Misión</h5>
                                <p class="small text-muted mb-0">Brindar formación profesional integral incorporando nuevas tecnologías para el desarrollo productivo del país.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border">
                                <h5 class="text-success fw-bold">Visión</h5>
                                <p class="small text-muted mb-0">Consolidarnos como una entidad líder en educación, impulsando la innovación tecnológica y el talento humano.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection