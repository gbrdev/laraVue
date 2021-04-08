<?php

namespace App\Http\Controllers;

use App\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //..recupera os dados do BD
        $products = Product::all();
        //..retorna a view com os dados recuperados
        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //..cria um array para definir as regras
        $rules = [
          'name' => 'string|required|min:5|max:100',
          'category' => 'string|required|min:5|max:100',
          'value' => 'required|numeric|between:1,90000'
        ];
        //..cria um array com mensagens personalizadas
        $messages = [
          'name.*' => 'O nome deve ter entre 5 e 100 caracteres',
          'category.*' => 'A categoria do produto deve ter entre 5 e 100 caracteres',
          'value.*' => 'O valor deve ser um número entre 1 e 90000'
        ];
        //..executa a validação, passando as mensagens
        $request->validate($rules, $messages);

        //..instancia um novo model
        $product = new Product();
        //..seta os dados do model a partir do $request
        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->value = $request->input('value');
        //..persiste o objeto no BD
        $product->save();
        //..redireciona para o index
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //..recupera o objeto pelo $id
        $product = Product::find($id);
        //..retorna a view contendo o model recuperado
        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //..recupera o model a ser atualizado
        $product = Product::find($id);
        //..retorna a view com o model a ser editado
        return view('product.edit')->with('product', $product);
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
        //..reaproveite o código de validação do store aqui!
        //--------------
        //..recupera o model a ser atualizado
        $product = Product::find($id);
        //..seta os novos dados no model
        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->value = $request->input('value');
        //..salva as alterações
        $product->save();
        //..redireciona para o index
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //..destrói um objeto pelo id
        Product::destroy($id);
        //..redireciona para o index
        return redirect(route('product.index'));
    }
}