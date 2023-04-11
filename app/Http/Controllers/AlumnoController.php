<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Nivel;
use Illuminate\Http\Request;

class AlumnoController extends Controller{
    //Mostrar los resultados
    public function index(){
        $alumnos = Alumno::all();
        return view ('alumnos.index', ['alumnos' => $alumnos]);
    }
    //Formulario
    public function create(){
        return view ('alumnos.create', ['nivels' => Nivel::all()]);
    }
    //Guardar
    public function store(Request $request){
        $request->validate([
            'Carnet' => 'required|unique:alumnos|max:12',
            'Nombre' => 'required|max:255',
            'Fecha' => 'required|date',
            'Telefono' => 'required|',
            'E-Mail' => 'nullable|email',
            'Nivel' => 'required',
        ]);
        $alumno = new Alumno();
        $alumno->Carnet = $request->input('Carnet');
        $alumno->Nombre = $request->input('Nombre');
        $alumno->Fecha_Nacimiento = $request->input('Fecha');
        $alumno->Telefono = $request->input('Telefono');
        $alumno->Email = $request->input('E-Mail');
        $alumno->nivel_id = $request->input('Nivel');
        $alumno->save();
        return redirect()->route('alumnos.index')->with('success','Alumno creado');
        //return view("alumnos.message")->with('success','Alumno creado');
    }
    //Mostrar
    public function show(Alumno $alumno){
        //
    }
    //Editar
    public function edit($id){
        $alumno = Alumno::find($id);
        return view('alumnos.edit',['alumno' => $alumno, 'nivels' => Nivel::all()]);
    }
    //Actualizar
    public function update(Request $request, $id){
        $request->validate([
            'Carnet' => 'required|max:12|unique:alumnos,Carnet,'.$id,
            'Nombre' => 'required|max:255',
            'Fecha' => 'required|date',
            'Telefono' => 'required|',
            'E-Mail' => 'nullable|email',
            'Nivel' => 'required',
        ]);
        $alumno = Alumno::find($id);
        $alumno->Carnet = $request->input('Carnet');
        $alumno->Nombre = $request->input('Nombre');
        $alumno->Fecha_Nacimiento = $request->input('Fecha');
        $alumno->Telefono = $request->input('Telefono');
        $alumno->Email = $request->input('E-Mail');
        $alumno->nivel_id = $request->input('Nivel');
        $alumno->save();
        return view("alumnos.message",['msg' => "Registro Actualizado"]);
    }
    //Eliminar
    public function destroy($id){
        $alumno = Alumno::find($id);
        $alumno->delete();
        return back()->with('success','Datos eliminados...');
    }
}
