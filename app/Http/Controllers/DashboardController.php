<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function libros(){
        return view('libro');
    }

    public function categorias(){
        return view('categoria');
    }

    public function autores(){
        return view('autor');
    }
}
