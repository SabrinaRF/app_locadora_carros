<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    use HasFactory;
    protected $table= "locacoes";
    protected $fillable = ['cliente_id','carro_id', 'data_inicio_periodo', 'data_final_previsto_periodo','data_final_realizado_periodo', 'valor_diaria', 'km_inicial', 'km_final'];

    public function rules(){
        return [
            'cliente_id'=>'exists:clientes,id',
            'carro_id'=> 'exists:carros,id',
            'data_inicio_periodo'=> 'required|date',
            'data_final_previsto_periodo'=> 'required|date',
            'data_final_realizado_periodo'=>'required|date',
            'valor_diaria'=> 'required',
            'km_inicial'=> 'required|integer',
            'km_final'=> 'required|integer'

        ];

    }

    public function cliente(){
        return  $this->belongsTo('App\Models\Cliente');
    }

    public function carro(){
        return  $this->belongsTo('App\Models\Carro');
    }

    

}
