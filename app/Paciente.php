<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['nome','sus','sexo','raca','profissao','mae','rg','data_nascimento'];
    protected $dates = ['data_nascimento'];
}
