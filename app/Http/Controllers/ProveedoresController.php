<?php

namespace App\Http\Controllers;

use App\Proveedores;
use App\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $personas = Personas::orderBy('id', 'desc')->paginate(3);
            $personas->each(function($personas){
                $personas->proveedor; //sobre la relacion
            });

            //dd($personas);
        }
        else{

            $personas = Personas::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
            $personas->each(function($personas){
            $personas->proveedor; //sobre la relacion
             });

        }


        return [
            'pagination' => [
                'total'        => $personas->total(),
                'current_page' => $personas->currentPage(),
                'per_page'     => $personas->perPage(),
                'last_page'    => $personas->lastPage(),
                'from'         => $personas->firstItem(),
                'to'           => $personas->lastItem(),
            ],
            'personas' => $personas
        ];
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction(); //insertar al mismo tiempo
            $personas = new Personas();
            $personas->nombre = $request->nombre;
            $personas->tipo_documento = $request->tipo_documento;
            $personas->num_documento = $request->num_documento;
            $personas->direccion = $request->direccion;
            $personas->telefono = $request->telefono;
            $personas->email = $request->email;
            $personas->save();

            $proveedores = new Proveedores();
            $proveedores->contacto = $request->contacto;
            $proveedores->telefono_contacto = $request->telefono_contacto;
            $proveedores->id = $personas->id;
            $proveedores->save();

            DB::commit();

        } catch (Exception $e){
            DB::rollBack();
        }
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            //Buscar primero el proveedor a modificar
            $proveedores = Proveedores::findOrFail($request->id);

            $personas = Personas::findOrFail($request->id);

            $personas->nombre = $request->nombre;
            $personas->tipo_documento = $request->tipo_documento;
            $personas->num_documento = $request->num_documento;
            $personas->direccion = $request->direccion;
            $personas->telefono = $request->telefono;
            $personas->email = $request->email;
            $personas->save();


            $proveedores->contacto = $request->contacto;
            $proveedores->telefono_contacto = $request->telefono_contacto;
            $proveedores->save();

            DB::commit();

        } catch (Exception $e){
            DB::rollBack();
        }

    }


}
