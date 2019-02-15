<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfusao extends Model
{
    protected $fillable = ['nome'];

    public function fichas() {
        return $this->hasMany(Ficha::class);
    }
}
