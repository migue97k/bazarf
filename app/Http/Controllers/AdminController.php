<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminPanel');
    }
    public function showClientes()
    {
        return view('clientes.clientesList');
    }
    public function showProducto()
    {
        return view('productos.productoList');
    }

    public function clienteseditar($id)
    {
        $idc=$id;
        return view('clientes.clientesEdit',[
            'id'=>$idc,
        ]);
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
        $idit = $id;
            return view('productos.productoEdit',[
                'id'=>$idit,
            ]);

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
        $user = User::find($id);
         $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'sexo' => 'required|string|max:255',
            'surname_m' => 'required|string|max:255',
            'surname_p' => 'required|string|max:255'
        ]);

            $name = $request->input('name');
            $surname_p = $request->input('surname_p');
            $surname_m = $request->input('surname_m');
            $email =$request->input('email');
            $sexo =$request->input('sexo');


            $user->name=$name;
            $user->surname_p=$surname_p;
            $user->surname_m=$surname_m;
            $user->sexo=$sexo;
            $user->email=$email;

            $user->update();
            return redirect()->route('Clientes')->with(['message'=>'Subido correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::find($id);
          $user->delete();
            return redirect()->route('Clientes')->with(['message'=>'Subido correctamente']);
    }
}
