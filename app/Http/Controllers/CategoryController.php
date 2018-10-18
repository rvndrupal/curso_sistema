<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=Category::all();

        return $categorias;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // if (!$request->ajax()) return redirect('/');
        $categoria = new Category();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = '1';
        $categoria->save();
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
        $categoria = Category::findOrFail($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = '1';
        $categoria->save();
    }


    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $categoria = Category::findOrFail($request->id);
        $categoria->condicion = '0';
        $categoria->save();
    }


    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $categoria = Category::findOrFail($request->id);
        $categoria->condicion = '1';
        $categoria->save();
    }


}