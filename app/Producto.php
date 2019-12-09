<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

	//Obtenemos la tabla de la base de datos
      protected $table = 'productos';

	//Declaramos la relacion uno a uno
	public function users(){
    	return $this->belongsTo('App\User','clienta_vende');
    }
    //Declaramos la relacion uno a uno
    public function categori(){
    	return $this->belongsTo('App\Area','area_id');
    }
}
