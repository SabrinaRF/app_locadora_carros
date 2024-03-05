<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'imagem'];

    public function rules(){
        return [
            'nome'=> 'required|unique:marcas|min:3',
            'imagem'=> 'required|file|mimes:png'
        ];

    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é de preenchimento obrigatório!',
            'nome.unique' => 'Já existe uma marca cadastrada com esse nome!',
            'imagem.mimes' => 'A imagem deve ser do tipo: png!',
            'nome.min' => 'O nome deve ter no minimo 3 caracteres!'
        ];
    }
}
