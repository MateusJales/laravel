<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $fillable = ['pacientes_id', 'finalizadi', 'doencas_bases_id', 'transfusaos_id', 'gravidades_id', 'data_reacao', 'descricao', 'pre_medicacao', 'reacao_adversa', 'indicacao', 'tipos_imediatas_id'];
    protected $dates = ['data_reacao'];
}
