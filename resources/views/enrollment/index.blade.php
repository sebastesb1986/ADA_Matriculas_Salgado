@extends('layouts.principal')

@section('title', 'Enfermedad')

@section('content')

<!-- Begin Page Content -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lista de alumnos</h1>
        
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="regStd()" >
            <i class="fas fa-plus fa-sm text-white-50"></i> Ingresar alumno
        </button>
      
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! $message !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Lista de alumnos</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="students-table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Correo electrónico</th>
                  <th>Edad</th>
                  <th>Ciudad</th>
                  <th>Asignaturas</th>
                  <th></th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
    </div>
    
    <!-- Ventana modal ingresar alumno -->
    @include('enrollment.modal')
    <!-- /.container-fluid -->

@stop

@push('styles')
    <!-- Style Datatables -->
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <style>
      .typeDisease{
        text-align: justify;
        text-justify: inter-word;
      }
    </style>
@endpush

@push('scripts')
    <!-- Datatables -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/enrollment/student.js') }}" type="text/javascript"></script>
    
@endpush