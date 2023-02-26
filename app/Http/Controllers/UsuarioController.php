<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perfil');
    }

    public function modificarPerfil(Request $request){

        try{
            $nuevoUsuario = $request->input('name');
            $nuevoEmail = $request->input('email');

            DB::transaction(function () use($nuevoUsuario,$nuevoEmail){
               DB::table('users')->where('id',Auth::id())->update(['name' => $nuevoUsuario, 'email' => $nuevoEmail]);
            });

            return redirect()->route('home');
        }
        catch (ValidationException $exception){
            redirect()->back()->withInput();
        }

    }

}
