<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    protected $modelo;

    public function __construct(Modelo $modelo)
    {
        $this->modelo = $modelo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $modelos = $this->modelo->all();
        return response()->json($modelos,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->modelo->rules(),$this->modelo->feedback());

        $imagem = $request->file('imagem');
        $imagem_urn = $imagem->store('imagens','public');

        $modelo = $this->modelo->create([
            'marca_id' => $request->marca,
            'nome'=> $request->nome,
            'imagem'=> $imagem_urn,
            'numero_portas' => $request->numero_port,
            'lugares' => $request->lugares,
            'air_bag' => $request->air_bag,
            'abs' => $request->abs
        ]);

       
        return response()->json($modelo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = $this->modelo->find($id);
        if($modelo === null){
            return response()->json(['erro' => 'Impossível localizar o modelo'],404);//['erro'=>'msg'];
        }
        return response()->json($modelo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelo $modelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo)
    {
        //
    }
}
