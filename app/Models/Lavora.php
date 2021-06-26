<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lavora extends Model {

    protected $table = 'lavora';
    public $timestamps = false;

    protected $fillable = [
        'user_id'
    ];

    protected $casts = [
        'content' => 'array'
    ];

    public function ospedale() {
        return $this->belogsTo("App\Models\Ospedale");
    }

    public function chirurgo() {
        return $this->belogsTo('App\Models\Chirurgo');
    }

}


?>