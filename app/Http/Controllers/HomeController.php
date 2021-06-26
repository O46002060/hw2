<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller{

   
   public function check($errore){
      $session_id = session('id');
      $user = User::find($session_id);
      if(!isset($user)){
          
          return view('login')
              ->with('csrf_token', csrf_token())
              ->with('errore', $errore);
      } else {
          return redirect('home')->with('user', $user);
      }
  }

    public function index(){
        $session_id = session('id');
        $user = user::find($session_id);
        if(!isset($user))
        return view('welcome');

        return view('home')->with('user', $user);
    }


    public function API($query){
        $json = Http::get('https://pixabay.com/api',[
        'key'=> env('APIKEY'),
        'q' => $query,
        'category' => 'health',
        ]);
        if($json->failed()){
           abort(500);
        }else{
           return $json;
        }
        
     }

}
?>