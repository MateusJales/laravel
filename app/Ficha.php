<?php

namespace App;

use App\Http\Controllers\PacienteController;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $fillable = ['users_id', 'pacientes_id', 'finalizado','doenca_bases_id','transfusaos_id','gravidades_id', 'data_reacao', 'descricao', 'pre_medicacao', 'reacao_adversa', 'indicacao','tipos_imediatas_id'];

    protected $dates = ['data_reacao'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }

    public function doenca_base() {
        return $this->belongsTo(Doenca_base::class);
    }

    public function transfusao() {
        return $this->belongsTo(Transfusao::class);
    }

    public function gravidade() {
        return $this->belongsTo(Gravidade::class);
    }

    public function tipos_imediata() {
        return $this->belongsTo(Tipos_imediata::class);
    }
}
