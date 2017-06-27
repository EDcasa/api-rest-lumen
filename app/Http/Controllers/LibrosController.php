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

	public function registraLibros(Request $request)
	{
		$registroLibro = new Libros();
		$registroLibro->titulo = $request->input("titulo");
		$registroLibro->editorial = $request->input("editorial");
		$registroLibro->año_publicacion = $request->input("año-publicacion");
		$registroLibro->edicion = $request->input("edicion");
		$responseRegistroLibro = $registroLibro->save();

		if($responseRegistroLibro == true){
		   return response()->json($responseRegistroLibro, 200);
		}elseif($responseRegistroLibro == false){
		   return response()->json($responseRegistroLibro, 200);
		}
	}

	public function registraAutores(Request $request)
	{
		$registroAutor = new Autores();
		$registroAutor->nombre = $request->input("nombre");
		$registroAutor->apellido_paterno = $request->input("apellido_paterno");
		$registroAutor->apellido_materno = $request->input("apellido_materno");
		$registroAutor->fecha_nacimiento = $request->input("fecha_nacimiento");
		$registroAutor->pais_origen = $request->input("pais_origen");
		$responseRegistroAutor = $registroAutor->save();

		if($responseRegistroAutor == true){
		   return response()->json($responseRegistroAutor, 200);
		}elseif($responseRegistroLibro == false){
		   return response()->json($responseRegistroAutor, 200);
		}
	}
}