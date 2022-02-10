<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Variable busqueda
        $busqueda = '';
        if ($request->get('busqueda')) {
            $busqueda = $request->get('busqueda');
        }
        // Exista o no exista búsqueda, los ordenamos
        $builder = Experience::orderBy('id', 'desc');
        if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('title', 'LIKE', '%' . $busqueda . '%');
        }
        // Al final de todo, invocamos a paginate que tendrá todos los filtros
        $experiences = $builder->paginate(2);
        return view('admin.experience.index', [
            'experiences' => $experiences,
        ])->with(
            'i',
            (request()->input('page', 1) - 1) * $experiences->perPage()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $experience = new experience($request->all());

            $experience->save();
            return redirect()
                ->route('experience.index')
                ->with('success', 'El registro fue exitoso!');
        } catch (\Exception $e) {
            return back()->with(
                'success',
                'Hubo un error al registrar, intente de nuevo!'
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        return view('admin.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $experience = Experience::findOrFail($id);
            $experience->fill($request->all());

            $experience->save();
            return redirect()
                ->route('experience.index')
                ->with('success', 'La actualización fue exitoso!');
        } catch (\Exception $e) {
            return back()->with(
                'success',
                'Hubo un error al actualizar, intente de nuevo!'
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();
        return redirect('/admin/experience');
    }
}
