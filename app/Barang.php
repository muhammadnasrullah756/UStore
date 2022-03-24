<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'name', 'description' , 'price' , 'image'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function cart() {
        return $this->belongsTo('App\Cart');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
