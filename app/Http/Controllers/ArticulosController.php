<?php

namespace App\Http\Controllers;

use App\Articulos;
use App\Category;
use Illuminate\Http\Request;

class ArticulosController extends Controller
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



       /* $articulos = Articulos::paginate(3);

            $articulos->each(function($articulos){
                $articulos->category;
            });
           // dd($articulos);*/

        if ($buscar==''){
            $articulos = Articulos::orderBy('id', 'desc')->paginate(3);
            $articulos->each(function($articulos){
                $articulos->category;
            });

        }
        else{
            $articulos = Articulos::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
            $articulos->each(function($articulos){
                $articulos->category;

            });
        }



        return [
            'pagination' => [
                'total'        => $articulos->total(),
                'current_page' => $articulos->currentPage(),
                'per_page'     => $articulos->perPage(),
                'last_page'    => $articulos->lastPage(),
                'from'         => $articulos->firstItem(),
                'to'           => $articulos->lastItem(),
            ],
            'articulos' => $articulos
        ];

    }

    /*

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if (!$request->ajax()) return redirect('/');
        $articulos = new Articulos();
        $articulos->category_id = $request->category_id;
        $articulos->codigo = $request->codigo;
        $articulos->nombre = $request->nombre;
        $articulos->precio_venta = $request->precio_venta;
        $articulos->stock = $request->stock;
        $articulos->descripcion = $request->descripcion;
        $articulos->condicion = '1';
        $articulos->save();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (!$request->ajax()) return redirect('/');
        $articulos = Articulos::findOrFail($request->id);
        $articulos->category_id = $request->category_id;
        $articulos->codigo = $request->codigo;
        $articulos->nombre = $request->nombre;
        $articulos->precio_venta = $request->precio_venta;
        $articulos->stock = $request->stock;
        $articulos->descripcion = $request->descripcion;
        $articulos->condicion = '1';
        $articulos->save();
    }


    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulos::findOrFail($request->id);
        $articulo->condicion = '0';
        $articulo->save();
    }


    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulos::findOrFail($request->id);
        $articulo->condicion = '1';
        $articulo->save();
    }
}
