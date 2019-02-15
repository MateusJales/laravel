<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_imediata extends Model
{
    protected $fillable = ['nome'];

    public function fichas() {
        return $this->hasMany(Ficha::class);
    }
}
