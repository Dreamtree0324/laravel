<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
        'title', 'content', 'writer',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'writer', 'id');

    }
}
