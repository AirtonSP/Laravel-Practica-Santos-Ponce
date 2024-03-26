<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    //
    public function index (Request $request) 
    { 
        $params = $request->all();
        $size = isset($params['size']) ? $params['size'] : 5;
        $usuarios = Usuario::where('nombre','>=', $params['nombre']) 
        ->limit($size)->get();
        return $usuarios;
    }

    public function show ($id)
    { 
        $usuario = Usuario::find($id);
        return $usuario; 
    }

    public function store (Request $request) 
    { 
        $params = $request->all(); 
        $usuario = Usuario::create([ 
            'nombre' =>$params['nombre'], 
            'correo' =>$params['correo'],
            'edad' =>$params['edad']
        ]);
        return $usuario; 
    }

    public function update ($id,Request $request) 
    { 
        $params = $request->all(); 
        Usuario::find($id)->update([
            'nombre' =>$params['nombre'], 
            'correo' =>$params['correo'], 
            'edad' =>$params['edad'],  
        ]);
        return 'Registro actualizado';
    }

    public function destroy ($id) 
    { 
        Usuario::find($id)->delete();
        return 'Registro eliminado'; 
    } 

}
