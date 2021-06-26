<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reparto extends Model {

    protected $table = 'reparto';
    public $timestamps = false;


    protected $fillable = [
        'user_id'
    ];

    protected $casts = [
        'content' => 'array'
    ];


    public function chirurgo() {
        return $this->belogsTo('App\Models\Chirurgo');
    }

}


?>