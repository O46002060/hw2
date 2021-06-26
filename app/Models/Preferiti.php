<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preferiti extends Model {

    protected $table = 'preferiti';
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'utente', 
        'chirurgo', 
        'nome', 
        'email', 
        'image', 
        'nomeR', 
        'ospedale', 
        'citta', 
        'indirizzo', 
        'date'
    ];

       
   
}


?>