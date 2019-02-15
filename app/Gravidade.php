<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gravidade extends Model
{
    protected $fillable = ['nome'];

    public function fichas() {
        return $this->hasMany(Ficha::class);
    }
}
