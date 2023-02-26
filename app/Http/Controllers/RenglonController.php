<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\ValidationException;
use Session;

class RenglonController extends Controller
{

    public function crearRenglon(Request $renglon){

        if($this->validar($renglon)) {
            try {
                DB::transaction(function () use ($renglon) {
                    DB::insert('INSERT INTO renglon (contenido,cumplido,id_usuario) values (?,?,?)', [
                        $renglon->post('contenido'),
                        0,
                        Auth::id()
                    ]);
                });

                return redirect()->back();
            } catch (ValidationException $exception) {
                return redirect()->back();
            }
        }
        else{
            Session::flash('error','El campo no debe estar vacío');
            return redirect()->back();
        }
    }

    public function cumplirTarea(Request $request){

        try {
            $id = $request->input('id');
            DB::transaction(function () use($id){
                DB::table('renglon')->where('id_renglon',$id)->update(['cumplido' => 1]);
            });

            return redirect()->back();
        }
        catch(ValidationException $exception){
            return redirect()->back();
        }

    }

    public function editarTarea(Request $request){

        try {
            $id = $request->input('id');
            DB::transaction(function () use ($id) {
                DB::table('renglon')->where('id_renglon', $id)->update(['cumplido' => 2]);
            });

            return redirect()->back();

        }
        catch (ValidationException $exception){
            return redirect()->back();
        }
    }

    public function validar(Request $request){

        $acceso = strlen($request->input('contenido') > 0);

        return $acceso;

    }

    public function actualizarRenglon(Request $request){

        if($this->validar($request)) {
            try {
                $id = $request->input('id');
                $contenidoNuevo = $request->input('contenido');
                DB::transaction(function () use ($contenidoNuevo, $id) {
                    DB::table('renglon')->where('id_renglon', $id)->update(['contenido' => $contenidoNuevo,'cumplido' => 0]);
                });

                return redirect()->back();
            }
            catch (ValidationException $exception){
                return redirect()->back()->withErrors();
            }
        }
        else{
            Session::flash('error','El campo no debe estar vacío');
            return redirect()->back();
        }
    }

    public function eliminarTarea(Request $request){

        try{
            $id = $request->input('id');
            DB::transaction(function () use($id){
               DB::table('renglon')->where('id_renglon',$id)->delete();
            });

            return redirect()->back();
        }
        catch(ValidationException $exception){
            return redirect()->back();
        }
    }

}
