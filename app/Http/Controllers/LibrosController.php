<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Libros;
use App\Autores;

class LibrosController extends Controller
{
	public function listaLibros()
	{
		$libros = Libros::all();
		return response()->json($libros,200);
	}

	public function listaAutores()
	{
		$autores = Autores::all();
		return response()->json($autores,200);
	}

	public function listaAutoresLibros()
	{	
		$id_autor_test = 2;
		$select_libros_autores = DB::table('libros')
		->join('librosAutor','libros.id','=','librosAutor.id_libros')
		->select('*')
		->where('id_autores',$id_autor_test)
		->get();
		return response()->json($select_libros_autores);
	}
}