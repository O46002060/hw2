@extends('layout.guest')

@section('title', 'Commenti')
@section('css', '/hw2/public/css/commento.css')
@section('script')
<script src='{{ asset('js/commento.js') }}' defer></script>
@endsection

@section('links2')

@section('links2')


<div class= 'hiddenL'>
                     <img src='./images/exit.png'>
                     <a href="{{ route('home') }}">Home</a>
             <a href="{{ route('logout') }}">Logout</a>
                 </div> 

                 @endsection

@section('header')

@section('links')

<div id='menu'>
             <div></div>
             <div></div>
             </div>

             <div id= 'links'>
             <a href="{{ route('home') }}">Home</a>
             <a href="{{ route('logout') }}">Logout</a>
      </div>
         
             @endsection
                 @section('contenuti')
           <div class='testo'>
           <h1> Qui potrai scrivere recensioni su chirurghi, sul sito o visualizzare i commenti di altri utenti</h1>
           </div>
           <div class= 'scrivi'>
           <h1> Scrivi il tuo commento  </h1>
           </div>
                 <div class='comme'>
                 <form name='create' method='post' action="{{route('commenti')}}"">
                 <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                 <label> <textarea name="text"></textarea></label>
                 <label> &nbsp <input type='submit' value='Invia' id='invia'></input></label>
                 </form>
                 </div>
                 

           <div class= 'visualizza'>
           <h1> Visualizza i commenti </h1>
           </div>
           <div class='showC'>
           </div>
          

                 @endsection
