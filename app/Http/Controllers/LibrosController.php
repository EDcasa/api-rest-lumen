<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Libros;

class LibrosController extends Controller
{
	public function listaLibros()
	{
		$libros = Libros::all();
		return response()->json($libros,200);
	}
}