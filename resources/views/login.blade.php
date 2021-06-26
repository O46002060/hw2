@extends('layout.guest')

@section('title', 'login')
@section('css', '/hw2/public/css/login.css')
@section('script')
<script src='{{ asset('js/login.js') }}' defer></script>
@endsection
@section('header')

@section('links')

<div id='menu'>
                     <div></div>
                 </div>
                 <div id= 'links'>
                <a href="{{ route('homePage') }}">Home</a>
                 </div>
                 @endsection

            @section('contenuti')     
        <main class='main'>
        <section class='login'>
        <h1>Accedi al tuo account!</h1>
            <form name='login' method='post' action="{{ route('login') }}">
            <input type='hidden' name='_token' value='{{ $csrf_token }}'>
            @csrf
            <span>{{ $errore }} </span>
            
                  <span class='hidden'></span>  
                <div class="username">
                <div class='label'><label>Utente </label></div>
                <div><input type='text' name='username' placeholder='inserisi nome utente' value="{{ old('username')}}"></div>
            
                </div>
                <div class="password">
                    <div class='label'><label>Password</label></div>
                    <div> <input type='password' name='password' placeholder='inserisi password'></div>
        
                </div>
               
                <div>
                    <label>&nbsp<input input class='submit' type='submit' value='Accedi'></label>
                </div>
            </form>
            <div class='registrati'><p class='verifica'>Non hai un account?</p><a class = 'registra' href="{{ route('register') }}"><em>Registrati</em></a></div>
            </section>
        </main>
        @endsection