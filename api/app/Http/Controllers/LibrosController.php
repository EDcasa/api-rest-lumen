<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
		   return response()->json($responseRegistroAutor, 201);
		}
	}

	public function eliminaAutores(Request $request, $id)
	{
		$eliminaAutor = Autores::findOrFail($id);
		$eliminaAutor->delete();

		return response()->json($eliminaAutor,200);
	}

	public function eliminaLibros(Request $request, $id)
	{
		$eliminaLibro = Libros::findOrFail($id);
		$eliminaLibro->delete();

		return response()->json($eliminaLibro,200);
	}

	public function editaLibros(Request $request, $id)
	{
		$editaLibro = Libros::findOrFail($id);
		$editaLibro->titulo = $request->input("titulo");
		$editaLibro->editorial = $request->input("editorial");
		$editaLibro->anio_publicacion = $request->input("anio_publicacion");
		$editaLibro->edicion = $request->input("editorial");
		$editaLibro->save();

		return response()->json($editaLibro, 200);
	}

	public function editaAutores(Request $request, $id)

	{
		$editaAutor = Autores::findOrFail($id);
		$editaAutor->nombre = $request->input("nombre");
		$editaAutor->apellido_paterno = $request->input("apellido_paterno");
		$editaAutor->apellido_materno = $request->input("apellido_materno");
		$editaAutor->fecha_nacimiento = $request->input("fecha_nacimiento");
		$editaAutor->pais_origen = $request->input("pais_origen");
		$editaAutor->save();

		return response()->json($editaAutor, 200);

	}
}
