<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'barang_id', 'price'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function barang() {
        return $this->hasMany(App\Barang::class);
    }
}
