<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
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
        $builder = Education::orderBy('id', 'desc');
        if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('title', 'LIKE', '%' . $busqueda . '%');
        }
        // Al final de todo, invocamos a paginate que tendrá todos los filtros
        $educations = $builder->paginate(5);
        return view('admin.education.index', [
            'educations' => $educations,
        ])->with(
            'i',
            (request()->input('page', 1) - 1) * $educations->perPage()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education.create');
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
            $education = new Education($request->all());
            $education->save();
            return redirect()
                ->route('education.index')
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
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
            $education = Education::findOrFail($id);
            $education->fill($request->all());

            $education->save();
            return redirect()
                ->route('education.index')
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
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect('/admin/education');
    }
}
