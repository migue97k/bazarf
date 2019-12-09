<?php

namespace App\Http\Controllers;
use App\Area;
use Illuminate\Http\Request;

class areacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function savedatos(Request $request)
    {

        //Hacemos un conexion a la tabla
        $ventas = new Area;
        //Validamos los datos que mandamos por el formulario
        $validate = $this->validate($request,[
            'name'=>'required',
            'descripcion'=>'required',
        ]);
        //Optenemos las variables del formulario
            $name = $request->input('name');
            $descripcion = $request->input('descripcion');

            //Ingresamos las variables a la tabla
            $ventas->name = $name;
            $ventas->descripcion = $descripcion;

            //Hacemos que guarden los datos
            $ventas->save();
            //var_dump($ventas);
            //Enviamos la vista
            return redirect()->route('welcome')->with(['message'=>'Subido correctamente']);


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
