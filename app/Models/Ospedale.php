<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ospedale extends Model {

    protected $table = 'ospedale';
    public $timestamps = false;

    protected $fillable = [
        'user_id'
    ];

    protected $casts = [
        'content' => 'array'
    ];


    public function lavora() {
        return $this->belogsTo('App\Models\Lavora');
    }

   

}


?>