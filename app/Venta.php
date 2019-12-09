<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
	//Obtenemos la tabla de la base de datos
    protected $table = 'ventas';
    //Declaramos la relacion uno a uno
    public function users(){
    	return $this->belongsTo('App\User','comprador');
    }
    //Declaramos la relacion uno a uno
    public function producto(){
    	return $this->belongsTo('App\Producto','producto_id');
    }

    public function userss(){
        return $this->belongsTo('App\User','quien_vendio');
    }
}
