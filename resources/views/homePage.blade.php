@extends('layout.layout')

@section('title', 'home')
@section('css', '/hw2/public/css/homePage.css')
@section('script')
<script src='{{ asset('js/homePage.js') }}' defer></script>
@endsection
@section('links2')


<div class= 'hidden3'>
                     <img src='./images/exit.png'>
                     <a href='{{ route("homePage") }}'>Home</a>
                     <a href='{{ route("login") }}'>Login</a>
                 </div> 

                 @endsection

@section('username', 'Accedi o registrati')
@section('header')
               
                 @section('links')
                 <div id = 'menu'>
                     <div></div>
                     <div></div>
</div>


                 <div id= 'links'>
                     <a href='{{ route("homePage") }}'>Home</a>
                     <a href='{{ route("login") }}'>Login</a>
                 </div>
                 
                 @endsection
                 
                 @section('contenuti')
                <div id='main'>
                    <h1>Your Surgeon è un sito che dà informazioni su chirurghi.</h1>
                    <p>Qui potrai avere informazioni riguardo chirurghi presenti nel sito di diverse zone d'Italia e</br>
                    In particolare:</p>
               <ul>
                   <li><span class='elenco'>elenco dei chirurghi presenti nel sito</span></li>
                   <li><span class='elenco'>elenco degli ospedali dove lavorano i chirurghi</span></li>
                   <li><span class='elenco'>Potrai trovare immagini aderenti alla salute/cura</span></li>
               </ul>
               <h1> Accedi o registrati per usufruire dei nostri servizi</h1>
               
                <div id='image'>
                    <h2>Chirurghi</h2>
                    <div id='chirurgo'>
                        <img src='./images/img1.png'>
                        <p>In questa sezione sarà possibile visualizzare l'elenco dei <b> chirurghi </b> registrati nel nostro sito,</br>
                            e alcuni informazioni utili</br></p>
                    </div>
                    <h2>Ospedale</h2>
                    <div id='ospedale'>
                        <img src="./images/img2.png"> <p>In questa sezione sarà possibile visualizzare l'elenco degli <b> ospedali </b> dove lavorano i nostri chirurghi.
                        </br>
                    </p>
                    </div>
                
                
                <h2>Immagini</h2>
                <div class='immagini'>
                    <p>Ricerca di immagini aderenti alla salute/cura.<br>
                    <h1>Registrati per usufruire del servizio</h1></p>
                </div>
            </div>
            </section>
            @endsection