<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Home;
use Image;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::find(1);
        return view('admin.home.index', compact('home'));
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
        $request->validate([
            'imagen' => 'image|max:2048',
        ]);
        try {
            $home = Home::findOrFail($id);
            $home->fill($request->all());

            $foto_anterior = $home->imagen;

            if ($request->hasFile('imagen')) {
                $rutaAnterior = public_path('/images/home/' . $foto_anterior);
                if (file_exists($rutaAnterior)) {
                    unlink(realpath($rutaAnterior));
                }

                $picture = $request->file('imagen');
                $nuevonombre =
                    Str::slug($request->nombre) .
                    '_foto.' .
                    $picture->guessExtension();
                Image::make($picture->getRealPath())
                    ->fit(1920, 2880, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save(public_path('/images/home/' . $nuevonombre));

                $home->imagen = $nuevonombre;
            }

            $home->save();
            return redirect()
                ->route('home.index')
                ->with('success', 'La actualización fue exitoso!');
        } catch (\Exception $e) {
            return back()->with(
                'success',
                'Hubo un error al actualizar, intente de nuevo!'
            );
        }
    }
}
