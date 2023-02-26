<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Nette\Schema\ValidationException;

class ReestablecerController extends Controller
{

    public function reestablecer(Request $request){
        $email = $request->input('email');

        $token = Str::random(64);

        try {
            DB::transaction(function () use ($email, $token){
                DB::insert('INSERT INTO resetpassword (email,token) VALUES (?, ?)', [$email, $token] );
            });
        }
        catch (ValidationException $exc){
            return redirect()->back();
        }

        Mail::send('reestablecer', ['token' => $token], function ($message) use ($email) {
            $message->from('facundomalnero010@gmail.com', 'Lofiteando');
            $message->to($email);
            $message->subject('Reestablecer Contraseña');
        });

        return view('verificarToken');

    }

    public function confirmarPassword(Request $request){
        return view('auth.passwords.reset');
    }

    public function reestablecerPassword(Request $request){

        $usuario = DB::selectOne('SELECT email FROM resetpassword');

        try {

            $contra = $request->input('password');

            DB::transaction(function () use ($usuario,$contra) {
                DB::table('users')->where(['email' => $usuario->email])->update(['password' => Hash::make($contra)]);
                DB::table('resetpassword')->where(['email' => $usuario->email])->delete();
            });

            return redirect()->route('login');
        }
        catch(\Illuminate\Validation\ValidationException $e){
            return "El reestablecimiento de contraseña falló";
        }
    }
}
