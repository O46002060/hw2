@extends('layout.layout')

@section('title', 'home')
@section('css', '/hw2/public/css/home.css')
@section('script')
<script src='{{ asset('js/home.js') }}' defer></script>
@endsection

@section('links2')
<div class= 'hidden3'>
                     <img src='./images/exit.png'>
                     <a href="{{ route('home') }}">Home</a>
                     <a href="{{ route('chirurgo') }}">Chirurgo</a>
                     <a href="{{ route('ospedale') }}">Ospedale</a>
                     <a href="{{ route('rubrica') }}">Rubrica</a>
                     <a href="{{ route('commenti') }}">Altro</a>
                     <a href="{{ route('logout') }}">Logout</a>
                 </div> 
                 @endsection

@section('header')
@section('testo', 'Benvenuto')
@section('username', $user->username)
@section('links')

<div id='menu'>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                 </div>
                 <div id= 'links'>
               <a href="{{ route('home') }}">Home</a>
               <a href="{{ route('chirurgo') }}">Chirurgo</a>
               <a href="{{ route('ospedale') }}">Ospedale</a>
               <a href="{{ route('rubrica') }}">Rubrica</a>
               <a href="{{ route('commenti') }}">Altro</a>
               <a href="{{ route('logout') }}">Logout</a>
</div>

                

                 
                 @endsection
                 @section('contenuti')
                <div id='main'>
                    <h1> Sito che dà informazioni su chirurghi.</h1>
                    <p>Qui potrai avere informazioni riguardo chirurghi presenti nel sito di diverse zone d'Italia e</br>
                    In particolare:</p>
               <ul>
                  <li><span class='elenco'>elenco dei chirurghi presenti nel sito</span></li>
                   <li><span class='elenco'>elenco degli ospedali dove lavorano i chirurghi</span></li>
                   <li><span class='elenco'>Potrai trovare immagini aderenti alla salute/cura</span></li>
               </ul>
               
                <div id='image'>
                    <h2>Chirurghi</h2>
                    <div id='chirurgo'>
                        <img src='./images/img1.png'>
                        <p>In questa sezione sarà possibile visualizzare l'elenco dei <b> chirurghi </b> registrati nel nostro sito,</br>
                            e alcuni informazioni utili.</br>
                            <br><a href="{{ route('chirurgo') }}"> CHIRURGHI </a></p>
                    </div>
                    <h2>Ospedale</h2>
                    <div id='ospedale'>
                        <img src="./images/img2.png"> <p>In questa sezione sarà possibile visualizzare l'elenco degli <b> ospedali </b> dove lavorano i nostri chirurghi.
                        <br><a href="{{ route('ospedale') }}"> OSPEDALI </a></p>
                    </div>
                
                
                <h2>Immagini da vedere</h2>
                <div class='immagini'>
                    <p>Ricerca di immagini aderenti alla salute/cura.</p>
                </div>
                <form>
                    <label>Categoria: <input type='text' name = 'content' id ='content' placeholder="Inserisci una categoria"></label>
                <input class="submit" type='submit' value='Cerca'>
                </form>
                
                <article id="album-view">
			
                </article>
                <article id="modale" class="hidden"> 
                
                </article>
                </div>
            </div>
            </section>
            @endsection