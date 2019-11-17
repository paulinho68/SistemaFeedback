<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class ItemController extends Controller
{


    /*
    * @var Item
    */
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $itens = $this->item::orderBy('id','DESC')->get();
        return view('item.item_index', compact('itens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('item.item_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $messages = [
            'nome.required' => 'O campo nome é obrigatório!',
            'descricao.required' => 'O campo descrição é obrigatório!',
        ];
        
        $validatedData = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ], $messages);
        
        try {

            $item = $this->item;
            $item->nome = $request->nome;
            $item->descricao = $request->descricao;
            $item->save();
            return redirect()->route('item.index')->with('message', 'Registro criado com sucesso!');

        } catch (\Exception $e) {

            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }// else {
                return response()->json(ApiError::errorMessage('Houve um erro ao realzar operação de inserir', 1010), 500);
            //}

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $item = $this->item::find($id);
        return view('item.item_show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $item = $this->item::find($id);
        return view('item.item_edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $messages = [
            'nome.required' => 'O campo nome é obrigatório!',
            'descricao.required' => 'O campo descrição é obrigatório!',
        ];
        
        $validatedData = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ], $messages);

        try {

            $item = $this->item::findOrFail($id);
            $item->nome = $request->nome;
            $item->descricao = $request->descricao;
            $item->save();
            return redirect()->route('item.index')->with('message', 'Registro atualizado com sucesso!');

        } catch (\Exception $e) {

            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
            }// else {
                return response()->json(ApiError::errorMessage('Houve um erro ao realzar operação de alterar', 1011), 500);
            //}

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        try {

            $item = $this->item::findOrFail($id);
            $item->delete();
            return redirect()->route('item.index')->with('message','Registro excluído com sucesso!');

        } catch (\Exception $e) {

            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 500);
            }// else {
                return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de remover', 1012), 500);
            //}

        }

    }

}