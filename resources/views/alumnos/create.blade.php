@extends('layout/template')
@section('title','Registrar | Alumno')
@section('contnido')
<main>
    <div class = "container form-center">
        <h1>Registrar Alumno</h1>
        @if($errors->any)
            <div class="" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach
                </ul>   
            </div>
        @endif
        <form class="" action="{{url('alumnos')}}" method="post">
            @csrf
            <br><br>
            <div class="mb-3 row">
                <label for="Carnet" class=""col-sm-2 col-form-label">Carnet</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Carnet" id="Carnet" value="{{old('Carnet')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nombre" class=""col-sm-2 col-form-label">Nombre Completo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Nombre" id="Nombre" value="{{old('Nombre')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Fecha" class=""col-sm-2 col-form-label">Fecha_Nacimiento</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="Fecha" id="Fecha" value="{{old('Fecha')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Telefono" class=""col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-5">
                    <input type="number" step="1" class="form-control" name="Telefono" id="Telefono" value="{{old('Telefono')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="E-Mail" class=""col-sm-2 col-form-label">E-Mail</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="E-Mail" id="E-Mail" value="{{old('E-Mail')}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nivel" class=""col-sm-2 col-form-label">Nivel</label>
                <div class="col-sm-5">
                    <select name="Nivel" id="Nivel" class="form-select" required>
                        <option value="">Seleccionar nivel</option>
                        @foreach($nivels as $nivel)
                        <option value="{{ $nivel->id }}">{{ $nivel->Nombre  }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br><br>
            <a href = "{{ url ('alumnos') }}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>