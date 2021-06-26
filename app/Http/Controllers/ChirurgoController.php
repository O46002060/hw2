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
use Illuminate\Support\Facades\DB;

class ChirurgoController extends Controller{

 public function chirurgo(){

   if(session('id')!=null){
      return view('chirurgo')->with('csrf_token', csrf_token());
  }

  else return view('welcome');
 
}

 public function show(){

      $mostra = DB::table('chirurgo')
                ->join('lavora', 'chirurgo.id_chirurgo', '=', 'lavora.chirurgo')
                ->join('ospedale', 'lavora.ospedale', '=', 'ospedale.id_ospedale')
                ->join('reparto', 'chirurgo.id_chirurgo', '=', 'reparto.chirurgo')
                ->get();

    return $mostra;

 }

  public function search(){
   $json = Http::get('https://covid-api.mmediagroup.fr/v1/cases?country=Italy');
 // $json = Http::get('https://neurovault.org/api/images/');
   if($json->failed()){
      abort(500);
   }else{
      return $json;
   }
   
}

public function search1(){
   // $json = Http::get('https://covid-19.dataflowkit.com/assets/widget/covid-19.html');
    $json = Http::get('https://covid-api.mmediagroup.fr/v1//vaccines?country=Italy');
  
    if($json->failed()){
       abort(500);
    }else{
       return $json;
    }
    
 }


public function operation1(){
   $mostra = DB::table('paziente')
   ->join('camera', 'paziente.id_paziente', '=', 'camera.paziente')
   ->join('opera', 'paziente.id_paziente', '=', 'opera.paziente')
   ->join('chirurgo', 'opera.chirurgo', '=', 'chirurgo.id_chirurgo')
   ->join('reparto', 'chirurgo.id_chirurgo', '=', 'reparto.chirurgo')
   ->groupBy('paziente.nomeP')
   ->get();

   return $mostra;

}

public function aggiungi(Request $request){

   $date = new DateTime(date("Y-m-d"));

   $session_id = session('id');
   $user = User::find($session_id);

   $preferiti =  new Preferiti();

   $preferiti->utente = $user->id;
   $preferiti->chirurgo = request('chirurgo');
   $preferiti->nome = request('nome');
   $preferiti->email = request('email');
   $preferiti->image = request('image');
   $preferiti->nomeR = request('nomeR');
   $preferiti->ospedale = request('ospedale');
   $preferiti->citta = request('citta');
   $preferiti->indirizzo = request('indirizzo');
   $preferiti->date = $date;
   
   $preferiti->save();

}

  
}

?>