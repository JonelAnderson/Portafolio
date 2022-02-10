<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;

class CorreoController extends Controller
{
    public function index(Request $request)
    {
        //Variable busqueda
        $busqueda = '';
        if ($request->get('busqueda')) {
            $busqueda = $request->get('busqueda');
        }
        // Exista o no exista búsqueda, los ordenamos
        $builder = Email::orderBy('id','desc');
        if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('name', 'LIKE', '%'. $busqueda . '%');
        }
        // Al final de todo, invocamos a paginate que tendrá todos los filtros
        $correos = $builder->paginate(2);
        return view('admin.correo.correo', ['correos'=>$correos])->with(
            'i',
            (request()->input('page', 1) - 1) * $correos->perPage()
        );
    }

    public function show($id)
    {
        $correo = Email::find($id);

        return view('admin.correo.show', compact('correo'));
    }
    public function destroy($id)
    {
        $correo = Email::findOrFail($id);
        $correo->delete();
        return redirect('/admin/correo');
    }
}

