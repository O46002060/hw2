@extends('layout.guest')

@section('title', 'Chirurghi')
@section('css', '/hw2/public/css/chirurgo.css')
@section('script')
<script src='{{ asset('js/mostraChirurghi.js') }}' defer></script>
@endsection
@section('links2')


<div class= 'hiddenL'>
                     <img src='./images/exit.png'>
                     <a href="{{ route('home') }}">Home</a>
             <a href="{{ route('ospedale') }}">Ospedale</a>
             <a href="{{ route('rubrica') }}">Rubrica</a>
             <a href="{{ route('logout') }}">Logout</a>
                 </div> 

                 @endsection

@section('header')

@section('links')

<div id='menu'>
             <div></div>
             <div></div>
             <div></div>
             <div></div>
             </div>

             <div id= 'links'>
             <a href="{{ route('home') }}">Home</a>
             <a href="{{ route('ospedale') }}">Ospedale</a>
             <a href="{{ route('rubrica') }}">Rubrica</a>
             <a href="{{ route('logout') }}">Logout</a>
      </div>
         
             @endsection
                 @section('contenuti')
        <section class='descrizione'>
            <p>Lista dei chirurghi registrati nel sito, dove è possibile aggiungere ai preferiti per avere un contatto.<br>
            
          
            <article id="modale" class="hidden"> 
		
            </article>
        </section>

        <article id="aggiunto" class="hidden"> 
		
            </article>

        <div class='content'>
        <input type='hidden' name='_token' value='{{ $csrf_token }}'>
        </div>
        
    <section class='elementi' id='el'><h1>Lista chirurghi</h1>
        <p>Cerca: <input type="text" id='cerca' placeholder="reparto"></p>
    </section> 

    <section class='operazioni' id='op'><h1>Altro</h1>
    <div>
    <ul class='elenco'>
    <li class='op1'><p>Elenco dei pazienti ricoverati</p> </li>
    <form><input class="submit1" type='submit' value="nascondi"></form><br>
           <article id="album-view">
			
            </article>
   
    <li class='a1'><p> Mostra informazioni su contagi covid</p></li>
    <form><input class="submit2" type='submit' value="nascondi"></form><br>
           <article id="album-view1">
			
            </article>

    <li class='a2'><p> Mostra informazioni su vaccinazioni covid</p> </li>
    <form><input class="submit3" type='submit' value="nascondi"></form><br>
           <article id="album-view2">
			
            </article>
           
    </ul>
    </div>
</section>
</section>
@endsection
