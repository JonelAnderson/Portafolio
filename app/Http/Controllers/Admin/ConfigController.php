<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ConfigController extends Controller
{
    public function Service(){
        $service = file_get_contents(base_path().'/resources/views/service.blade.php',FILE_USE_INCLUDE_PATH);


        return view('admin.services.index',compact('service'));
    }
    public function save_cambios(Request $request){

        try {
            $code = $request->get('code');

            file_put_contents(base_path().'/resources/views/service.blade.php',$code);
            Session::flash('success', 'Se guardó los cambios de la configuración');
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
        }
    }

}
