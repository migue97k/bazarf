<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Producto;
use User;


class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
