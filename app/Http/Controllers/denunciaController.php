<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\denuncias;

class denunciaController extends Controller
{
    public function create(Request $request){
        denuncias::create($request->all());
        $id = denuncias::max('id');
        $denuncia = denuncias::find($id);

        
        if ($request->hasFile('nm_imagem') && $request->file('nm_imagem')->isValid()) {
            
            $name = "denuncia_".$id;
            $extention = $request->nm_imagem->extension();
            $name_file = "{$name}.{$extention}";
            
            $request->nm_imagem->storeAs('denuncias', $name_file);
            $denuncia->nm_imagem = $name_file;
            $denuncia->save();
            $request->session()->forget('denuncia');
            $request->session()->push('denuncia', [
                'img' => $name_file
            ]);
            session()->flash('success','O denuncia '.$resposta->nome.' foi atualizado com sucesso!');
            return redirect('/form/denuncias');
        }   
    }

    public function showform(){
        return view ('denuncias');
    }

}