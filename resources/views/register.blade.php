@extends('layout.guest')

@section('title', 'Register')
@section('css', '/hw2/public/css/registrazione.css')
@section('script')
<script src='{{ asset('js/registrazione.js') }}' defer></script>
@endsection
@section('links2')
<div class= 'hidden3'>
                     <img src='./images/exit.png'>
                     <a href="{{ route('homePage') }}">Home</a>
                     <a href="{{ route('login') }}">Login</a>
                 </div> 
                 @endsection
@section('header')

@section('links')
<div id='menu'>
                     <div></div>
                     <div></div>
                 </div>
                 <div id= 'links'>
                 <a href="{{ route('homePage') }}">Home</a>
                     <a href="{{ route('login') }}">Login</a>
                 @endsection

@section('contenuti')  
            <main class='main'>
        <section class='signup'>
              <form name='nome_form1' method='post'  action="{{ route('register') }}">
            <h1>Registrati!</h1>
            @csrf
            <div class="name @error('name') errorj @enderror">
            <div class='label'><label>Nome </label></div>
            <div><input type='text' name='name' placeholder='inserisi nome'  value='{{ old("name") }}'></div>
                <span>Nome strano</span>
                </div>
                <div class="surname @error('surname') errorj @enderror">
                <div class='label'><label>Cognome </label></div>
                <div><input type='text' name='surname' placeholder='inserisi cognome' value='{{ old("surname") }}'></div>
                <span>Cognome strano</span>
                </div>
                <div class="username @error('username') errorj @enderror">
                <div class='label'><label>Nome utente </label></div>
                <div><input type='text' name='username' placeholder='inserisi nome utente' value='{{ old("username") }}'></div>
                <span>&nbsp;@error('username') {{ $message }} @enderror</span>
                </div>
                <div class="mail @error('email') errorj @enderror">
                <div class='label'><label>E-mail </label></div>
                <div><input type='text' name='email' placeholder='inserisi mail' value='{{ old("email") }}'></div>
                <span>&nbsp;@error('email') {{ $message }} @enderror</span>
                </div>
                <div class="password @error('password') errorj @enderror">
                    <div class='label'><label>Password</label></div>
                    <div> <input type='password' name='password' placeholder='inserisi password'></div>
                    <span>&nbsp;@error('password') {{ $message }} @enderror</span>
                </div>
                <div class="password1 @error('password') errorj @enderror">
                <div class='label'><label>Conferma password </label></div>
                <div><input type='password' name='password1' placeholder='inserisi password'></div>
                <span>&nbsp;</span>
                </div>
                <div>
                    <label>&nbsp<input class='submit' type='submit' value='Accedi'></label>
                </div>
            </form>
                <div class='login'> <p class ='verifica'>Già registrato?</p><a class = 'accedi' href="{{ route('login') }}"><em>Accedi</em></a></div>
                </section>
        </main>
        @endsection