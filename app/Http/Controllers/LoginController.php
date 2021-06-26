<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{

    public function login(){
        if(session('id')!=null){
            return redirect('home');
        }
        else{
          $errore = false;
    return view('login')
    ->with('csrf_token', csrf_token())
    ->with('errore', $errore);
        }
    }


    public function checkLogin(){
      
        $user = User::where('username', request('username'))->first();
        if(!$user){
            $errore = 'username non trovato';
            return redirect('login/'.$errore)->withInput();
        }
        if(request('password')==null){
            $errore = 'inserisci password';
           
             return redirect('login/'.$errore)->withInput();
        }
        if(Hash::check(request('password'),$user->password)){
            Session::put('id', $user->id);
            return redirect('home')->with('user', $user)->with('csrf_token',csrf_token());
        } else {
            $errore = 'password non corretta';
            return redirect('login/'.$errore)->withInput();
        
        }
    }
  

    public function logout(){
        Session::flush();
        return redirect('homePage');
    }


}
?>