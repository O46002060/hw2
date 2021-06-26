<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commenti extends Model {

    protected $table = 'commenti';
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'utente', 
        'nome', 
        'content', 
        'date'
    ];
    protected $casts = [
        'content' => 'array'
    ];

}

?>