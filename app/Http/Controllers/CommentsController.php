<?php

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commenti;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;


class CommentsController extends Controller {

    public function commenti(){
        if(session('id')!=null){
            return view('commenti')->with('csrf_token', csrf_token());
        }
        else return view('welcome');
       }

    public function show(){
            $show = Commenti::all();
               return $show;
         }
         
    
    public function comments(Request $request)
    {
        $request = request();
        $comm = $request ->input('text');
      
        $session_id = session('id');
      
           $user = User::select('username')->where('id', $session_id)->first();
     
        $date = new DateTime(date("Y-m-d"));

        $comment = Commenti::create([
            'utente'=> Session::get('id'),
            'nome' => $user['username'],
            'content'=> $comm, 
            'date' => $date
        ]);


        $comment->save();
       return view('commenti')->with('csrf_token', csrf_token());
        }

}

?>