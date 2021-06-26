<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Preferiti;
use App\Models\Chirurgo;
use App\Models\Reparto;
use App\Models\Lavora;
use App\Models\Ospedale;
use Illuminate\Support\Facades\Session;

class RubricaController extends Controller{

 public function rubrica(){
       
    if(session('id')!=null){
      return view('rubrica');
  }
  else return view('welcome');
 }
 
  
 public function mostra(){
   $session_id = session('id');
   $show = Preferiti::all()->where('utente', $session_id);

    foreach($show as $v){
           $array[] =  $v;
    }
      return $array;
      
}

 public function remove(){
    $session_id = session('id');
    $remove = Preferiti::where('utente', $session_id)->where('nome', request('nome'))->delete();
    return $remove;
 }



}
