<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function selectAtributosRegistrosSelecionados($atributos)
    {
        $this->model = $this->model->with($atributos);
        //a query que está sendo montada
    }

    public function filtro($filtros)
    {
        $filtros = explode(';', $filtros);
        foreach ($filtros as $key => $condicoes) {
            $c = explode(':', $condicoes);
            $this->model = $this->model->where($c[0], $c[1], $c[2]);
        }
    }

    public function selectAtributos($atributos)
    {
        $this->model = $this->model->selectRaw($atributos);
    }

    public function getResultado()
    {
        return  $this->model->get();
    }
}


?>