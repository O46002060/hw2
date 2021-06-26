<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class OspedaleController extends Controller{

 public function ospedale(){
    
    if(session('id')!=null){
      return view('ospedale');
  }
  else return view('welcome');
 }

 public function showOsp(){

  $mostra = DB::table('ospedale')
  ->join('lavora', 'ospedale.id_ospedale', '=', 'lavora.ospedale')
  ->join('chirurgo', 'lavora.chirurgo', '=', 'chirurgo.id_chirurgo')
  ->join('reparto', 'chirurgo.id_chirurgo', '=', 'reparto.chirurgo')
  ->get();

/*
   $mostra = DB::select ("SELECT nome, citta, indirizzo, image, nomeC, nomeR from ospedale o, lavora l, chirurgo c, reparto r 
   where o.id_ospedale=l.ospedale and l.chirurgo=c.id_chirurgo and c.id_chirurgo=r.chirurgo");
*/
  return $mostra;
}

  public function ospOp(){

    $op1 = DB::table('lavorava')
  ->join('chirurgo', 'lavorava.chirurgo', '=', 'chirurgo.id_chirurgo')
  ->join('ospedale', 'lavorava.ospedale', '=', 'ospedale.id_ospedale')
  ->get();

    /*
    $op1 = DB::select("SELECT nomeC, imageC, nome, citta, indirizzo, image, dataInizio, dataFine from lavorava l 
    join chirurgo c on l.chirurgo=c.id_chirurgo join ospedale o on o.id_ospedale=l.ospedale");
    */
    return $op1;
  }

}