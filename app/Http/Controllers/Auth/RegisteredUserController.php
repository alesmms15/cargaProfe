<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Freshwork\ChileanBundle\Rut;
use App\Models\Alumno;
use App\Models\Profesor;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'rut' => 'required|string|max:12|unique:users',
            'role' => 'required',

        ]);

        $rut = Rut::parse($request->rut)->validate();
        $rut = Rut::parse($request->rut)->normalize();
        $numero = Rut::parse($request->rut)->number();

        if($request->role == "alumno"){
            
            $rut = Rut::parse($request->rut)->validate();
            $rut = Rut::parse($request->rut)->normalize();
            $numero = Rut::parse($request->rut)->number();
            
            $alumno = Alumno::create([
                'rut_alumno' => $rut,
                'correo' => $request->email,
                'nombre' => $request->name,
                'estado' => true,
                'es_ayudante' =>false,
                'password' => $numero,
            ]);
        }

        elseif($request->role == "docente"){
            $rut = Rut::parse($request->rut)->validate();
            $rut = Rut::parse($request->rut)->normalize();
            $numero = Rut::parse($request->rut)->number();

                $profesor = Profesor::create([
                    'rut_profesor' => $rut,
                    'nombre_profesor' => $request->name,
                    'correo' => $request -> email,
                    'es_encargado' => true,
                    'estado'=> true,
                    'password' => Hash::make($numero),
            ]);  
        }

       return redirect(RouteServiceProvider::HOME);
    }
}
