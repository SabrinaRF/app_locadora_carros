<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Marca;
use App\Repositories\MarcaRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class MarcaController extends Controller
{
    protected $marca;

    public function __construct(Marca $marca)
    {
        $this->marca = $marca;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $marcaRepository = new MarcaRepository($this->marca);
        
        if ($request->has('atributos_modelos')) {
            $atributos_modelos = 'modelos:id,'.$request->atributos_modelos;
            
            $marcaRepository->selectAtributosRegistrosSelecionados($atributos_modelos);
        } else {
            $marcaRepository->selectAtributosRegistrosSelecionados('modelos');
        }
        
        if ($request->has('filtro')) {
            $marcaRepository->filtro($request->filtro);
        }

        if ($request->has('atributos')) {
            $marcaRepository->selectAtributos($request->atributos);
        }
        
        return response()->json($marcaRepository->getResultado(),200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //$marca = Marca::create($request->all());
       
        $request->validate($this->marca->rules(),$this->marca->feedback());

        $imagem = $request->file('imagem');
        $imagem_urn = $imagem->store('imagens','public');

        $marca = $this->marca->create([
            'nome'=> $request->nome,
            'imagem'=> $imagem_urn
        ]);

       
        return response()->json($marca, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = $this->marca->with('modelos')->find($id);
        if($marca === null){
            return response()->json(['erro' => 'Impossível localizar a marca'],404);//['erro'=>'msg'];
        }
        return response()->json($marca, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //$marca->update($request->all());
        $marca = $this->marca->find($id);
        if($marca === null){
            return response()->json(['erro' => 'Impossível realizar a atualização o recurso solicitado não existe'],404);//['erro'=>'msg'];
        }
 
        if ($request->method() === "PATCH"){
            $regrasDinamicas = array();

            foreach ($marca->rules() as $input => $regra) {
                if (array_key_exists($input,$request->all())){
                    $regrasDinamicas[ $input ] = $regra;
                }
            }
            $request->validate($regrasDinamicas,$marca->feedback());
        }else{
            $request->validate($marca->rules(),$marca->feedback());
        }

        //remove o arquivo antigo
        if ($request->file('imagem')) {
            Storage::disk('public')->delete($marca->imagem);
        }
        
        $imagem = $request->file('imagem');
        $imagem_urn = $imagem->store('imagens','public');
       
        $marca->fill($request->all());
        $marca->imagem = $imagem_urn;

        $marca->save();
        return response()->json($marca, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = $this->marca->find($id);
        if($marca === null){
            return response()->json(['erro' => 'Impossível realizar a exclusão, marca não existe'],404);//['erro'=>'msg'];
        }
        
        //remove o arquivo antigo
        Storage::disk('public')->delete($marca->imagem);
        

        $marca->delete();
        return response()->json(['msg'=>'A marca foi excluida'], 200);
    }
}
