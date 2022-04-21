@extends('layouts.principal')

@section('title', 'Enfermedad')

@section('content')

<!-- Begin Page Content -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Asignaturas matriculadas por el alumno <b>{{ $student->name}} {{ $student->lastname }}</b></h1>
        
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('students.index') }}">
            <i class="fas fa-arrow-alt-left"></i>Atrás
        </a>
      
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
          <h6 class="m-0 font-weight-bold text-primary">Lista de asignaturas</h6>
        </div>
        <div class="card-body">

                <form method="POST" action="{{ route('enrollment.update', $student->id) }}" enctype="multipart/form-data" autocomplete="off">
                @csrf @method('PUT')

                <div class="mb-3"><label for="exampleFormControlInput1">Asignatura(s) a matricular</label>
                    <select class="form-control subjects @error('subject') is-invalid @enderror" name="subject[]" id="subject" multiple="multiple">
                        @foreach($subjects as $subject)
                        
                            <option {{ collect( old('subject', (count($student->subjects) != 0) ? $student->subjects->pluck('id') : '' ) )->contains($subject->id) ? 'selected' : '' }} value="{{ $subject->id}}">{{ $subject->name }} <small>({{ $subject->credits }} Creditos)</small></option>
                        @endforeach
                    </select>
                </div>
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mb-3"><label for="exampleFormControlInput2">Nombres</label>
                    <input type="text" class="form-control" id="name" value="{{ $student->name }}" disabled>
                </div>
                <div class="mb-3"><label for="exampleFormControlInput3">Apellidos</label>
                    <input type="text" class="form-control" id="lastname" value="{{ $student->lastname }}" disabled>
                </div>

                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Guardar Cambios
                </button>
            </form>

        </div>

    </div>
    
    <!-- Ventana modal matricular alumno -->
    @include('enrollment.enRll')
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
    
 
    <script>
      
       
        
        $("#subject").select2({
            width: '100%',
            placeholder: 'Seleccione...',
            language: {
                noResults: function () {
                    return "No hay resultado";
                },
                searching: function () {
                    return "Buscando..";
                }
            }
        });


    </script>
@endpush