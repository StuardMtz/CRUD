@extends('layout/template')
@section('title', 'Alumno | Escuela')
@section('contenido')
<div class="container"><br>
    @if($message= Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if($message= Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
<main><br>
    <div class="container text-center fondo"><br>
        <strong><h1>ESCUELA</h1></strong><br>
    </div><br>
    <div class="container text-center">
        <h4>Alumnos Registrados</h4>
        <br>
    </div>
    <div class="container text center border primary">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Carnet</td>
                    <td>Nombre</td>
                    <td>Fecha Nacimiento</td>
                    <td>Telefono</td>
                    <td>Email</td>
                    <td>Nivel</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{$alumno->id}}</td>
                        <td>{{$alumno->Carnet}}</td>
                        <td>{{$alumno->Nombre}}</td>
                        <td>{{$alumno->Fecha_Nacimiento}}</td>
                        <td>{{$alumno->Telefono}}</td>
                        <td>{{$alumno->Email}}</td>
                        <td>{{$alumno->nivel->Nombre}}</td>
                        <td><a href="{{url('alumnos/'.$alumno->id.'/edit')}}" class="btn btn-warning btn-sm" style="border-radius: 25px">Editar</a></td>
                        <td>
                            <form action="{{url('alumnos/'.$alumno->id)}}" method="post">
                                @method("DELETE")
                                @csrf
                                <BUtton type="submit" class="btn btn-danger btn-sm" style="border-radius: 25px">Eliminar</BUtton>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><br>
    <header class="navbar justify-content-center">
        <a href = "{{ url ('alumnos/create') }}" class="btn btn-info btn-lg" style="border-radius: 25px">Nuevo Registro</a>
    </header><br>
</main>