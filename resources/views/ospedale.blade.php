@extends('layout.guest')

@section('title', 'Ospedale')
@section('css', '/hw2/public/css/ospedale.css')
@section('script')
<script src='{{ asset('js/mostraOspedali.js') }}' defer></script>
@endsection
@section('links2')


<div class= 'hiddenL'>
                     <img src='./images/exit.png'>
                     <a href="{{ route('home') }}">Home</a>
                     <a href="{{ route('chirurgo') }}">Chirurgo</a>
                     <a href="{{ route('logout') }}">Logout</a>
                 </div> 

                 @endsection
@section('header')

@section('links')
<div id='menu'>
                     <div></div>
                     <div></div>
                     <div></div>
                 </div>
                 <div id= 'links'>
                     <a href="{{ route('home') }}">Home</a>
                     <a href="{{ route('chirurgo') }}">Chirurgo</a>
                     <a href="{{ route('logout') }}">Logout</a>
                 </div>
                 
                 @endsection
                 @section('contenuti')
            <article id="modale" class="hidden"> 
            
            </article>

            <section class='elementi'><h1>Lista Ospedali</h1>
        <p>Cerca: <input type="text" id='cerca' onekeyup='ricerca()' placeholder="ospedale o città"></p>
    </section> 
            <section class='operazioni' id='op'><h1>Alcune informazioni sugli ospedali</h1>
    <div>
    <ul class='elenco'>
    <li class='op1'><p>Chirurghi che hanno cambiato sede</p></li>
    </ul>
    </div>
</section> 
@endsection
