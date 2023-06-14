<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Direccione;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index()
    {

        $mantenimientos = Empleado::with(['municipio' => function ($query) {
            return $query->with('departamento');
        }])->get();

        // dd("test",$mantenimientos);
        // $municipio = Direccione::where('id_padre')->first();
        $data = array(
            "empleados" => Empleado::with(['municipio' => function ($query) {
                return $query->with('departamento');
            }])->get(),
            "departamentos" => Direccione::where('grupo', 'departamento')->get(),
            "municipios" => Direccione::where('grupo', 'municipio')->get()
        );

        return response()->json($data);
    }

    public function store(Request $request)
    {


        $empleados = new Empleado();
        $empleados->nombre = $request->input('nombre');
        $empleados->apellido = $request->input('apellido');
        $empleados->correo = $request->input('correo');
        $empleados->telefono = $request->input('telefono');

        $empleados->id_direccion = $request->input('id_direccion');
        $empleados->save();





        return response()->json('Datos creados correctamente');

        /*$mantenimiento = Empleado::create($request->all());


        return response()->json($mantenimiento, 201);*/
    }

    public function show($id)
    {
        //$mantenimiento = Empleado::with('municipio')->findOrFail($id);
        $mantenimiento = Empleado::with(['municipio' => function ($query) {
            return $query->with('departamento');
        }])->findOrFail($id);




        return response()->json($mantenimiento);
    }

    public function show_departamento()
    {
        $mantenimiento = Direccione::where('grupo', 'departamento')->get();

        return response()->json($mantenimiento);
    }
    public function show_municipio($id)
    {

        $id_padre = $id;
        $mantenimiento = Direccione::where('id_padre', $id_padre)->get();

        //$mantenimiento = Direccione::where('grupo', 'municipio' )->get();

        return response()->json($mantenimiento);
    }

    public function update(Request $request, $id)
    {
        /*$mantenimiento = Empleado::findOrFail($id);

        $empleados->nombre = $request->input('nombre');
        $empleados->apellido = $request->input('apellido');
        $empleados->correo = $request->input('correo');
        $empleados->telefono = $request->input('telefono');
        $empleados->id_direccion = $request->input('id_direccion');
        $empleados->save();

        return response()->json($mantenimiento);*/




        $mantenimiento = Empleado::findOrFail($id);
        $mantenimiento->update($request->all());


        return response()->json($mantenimiento);
    }

    public function destroy($id)
    {

        /*$empleados = Empleado::where('id_direccion',$id)->first();
        $empleados->delete();*/

        $empleados = Empleado::findOrFail($id);
        $empleados->delete();



        return response()->json(null, 204);
    }
}
