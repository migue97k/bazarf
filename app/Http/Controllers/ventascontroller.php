<?php

namespace App\Http\Controllers;
use App\Venta;
use App\Producto;
use Illuminate\Http\Request;

class ventascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Llamamos la vista
      return view('productos.productoComprado');
    }

    public function showvendidos()
    {
        //Llamamos la vista
      return view('productos.productoVendido');
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
                $pro = Producto::find($id);
                 $can = $pro->disponibles;
                 $uno=1;
                 $resta=$can-$uno;
                 $pro->disponibles=$resta;
                 $pro->update();
                return redirect()->route('welcome')->with(['message'=>'Subido correctamente']);
    }
    //  Guardamos datos de la venta a la tabla ventas
    public function savedatos(Request $request)
    {

        //Hacemos un conexion a la tabla
        $ventas = new Venta;
        //Validamos los datos que mandamos por el formulario
        $validate = $this->validate($request,[
            'producto_id'=>'required',
            'Fecha'=>'required',
            'quien_vendio'=>'required',
            'precio_venta'=>'required',
            'comprador'=>'required',
        ]);
        //Optenemos las variables del formulario
            $producto_id = $request->input('producto_id');
            $Fecha = $request->input('Fecha');
            $quien_vendio = $request->input('quien_vendio');
            $precio_venta = $request->input('precio_venta');
            $comprador = $request->input('comprador');
            //Ingresamos las variables a la tabla
            $ventas->producto_id = $producto_id;
            $ventas->Fecha = $Fecha;
            $ventas->quien_vendio = $quien_vendio;
            $ventas->precio_venta = $precio_venta;
            $ventas->comprador = $comprador;
            //Hacemos que guarden los datos
            $ventas->save();
            //var_dump($ventas);
            //Enviamos la vista
            return redirect()->route('producto.update2',['id'=>$producto_id])->with(['message'=>'Subido correctamente']);


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
