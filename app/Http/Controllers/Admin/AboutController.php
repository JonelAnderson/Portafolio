<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::find(1);
        return view('admin.about.index', compact('about'));
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
            $about = About::findOrFail($id);
            $about->fill($request->all());

            $about->save();
            return redirect()
                ->route('about.index')
                ->with('success', 'La actualización fue exitoso!');
        } catch (\Exception $e) {
            return back()->with(
                'success',
                'Hubo un error al actualizar, intente de nuevo!'
            );
        }
    }
}
