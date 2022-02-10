<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Email;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portafolio;

class FrontController extends Controller
{
    public function index()
    {
        $educations = Education::get();
        $experiences = Experience::get();
        $portafolios = Portafolio::get();

        return view('welcome', compact('educations', 'experiences','portafolios'));
    }
    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required',
        ]);
        try {
            $email = new Email($request->all());
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ];

            $correo = 'turismostingomaria@gmail.com';

            Mail::to($correo)->send(new SendMail($data));
            $email->save();
            return back()->with('success', 'Mensaje enviado exitosamente!');
        } catch (\Exception $e) {
            return back()->with(
                'success',
                'Hubo un error al enviar el mensaje, intente de nuevo!'
            );
        }
    }
}
