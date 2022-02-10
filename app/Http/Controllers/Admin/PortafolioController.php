<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portafolio;
use Illuminate\Http\Request;
use Image;

class PortafolioController extends Controller
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
        $builder = Portafolio::orderBy('id', 'desc');
        if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('title', 'LIKE', '%' . $busqueda . '%');
        }
        // Al final de todo, invocamos a paginate que tendrá todos los filtros
        $portafolios = $builder->paginate(5);
        return view('admin.portafolio.index', [
            'portafolios' => $portafolios,
        ])->with(
            'i',
            (request()->input('page', 1) - 1) * $portafolios->perPage()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portafolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['photo' => 'required|image|max:2048']);
        //try {
            $portafolio = new Portafolio($request->all());

            if ($request->hasFile('photo')) {
                $picture = $request->file('photo');
                $nuevonombre =
                    'portafolio' . time() . '.' . $picture->guessExtension();
                Image::make($picture->getRealPath())
                    ->fit(2048, 1180, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save(public_path('/images/portfolio/' . $nuevonombre));

                $portafolio->photo = $nuevonombre;
            }
            $portafolio->save();
            return redirect('/admin/portafolio')->with(
                'success',
                'El registro fue exitoso!'
            );
        
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
        $portafolio = Portafolio::findOrFail($id);
        return view('admin.portafolio.edit',compact('portafolio'));
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
        $request->validate(['photo'=>'image|max:2048']);
            try{

                $portafolio = Portafolio::findOrFail($id);
                $portafolio->fill($request->all());
                $foto_anterior     = $portafolio->photo;

                if($request->hasFile('photo')){

                    $rutaAnterior = public_path('/images/portafolio/'.$foto_anterior);
                    if(file_exists($rutaAnterior)){ unlink(realpath($rutaAnterior)); }

                    $picture = $request->file('photo');
                    
                    $nuevonombre = 'portafolio'.time().'.'.$picture->guessExtension();
                    Image::make($picture->getRealPath())
                    ->fit(2048,1180,function($constraint){ $constraint->upsize();  })
                    ->save( public_path('/images/portafolio/'.$nuevonombre));

                    $portafolio->photo = $nuevonombre;
                }
            
                $portafolio->save();
                return redirect('/admin/portafolio')->with('success', 'La actualización fue exitosa!');
            }catch (\Exception $e) {
                return back()->with('success', 'Hubo un error al actualizar portafolio, intente de nuevo!');
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
        $portafolio = Portafolio::findOrFail($id);
        $borrar = public_path('/images/portafolio/'.$portafolio->imagen);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        $portafolio->delete();
        return redirect('/admin/portafolio');
    }
}
