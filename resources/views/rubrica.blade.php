@extends('layout.guest')

@section('title', 'Rubrica')
@section('css', '/hw2/public/css/rubrica.css')
@section('script')
<script src='{{ asset('js/preferiti.js') }}' defer></script>
@endsection
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
                 @endsection
