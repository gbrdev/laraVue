<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use stdClass;

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
        
        $request->validate(
            $this->getRules(), $this->getErrorMessages()
        );
        
        //..recover the session data
        $products = session('products');
        //..generates an id
        $lastId = 0;
        if($products){
            $lastIndex = count($products) - 1;
            $lastId = $products[$lastIndex]->id;
        }
        //..creates a new standard object
        $p = new stdClass;
        $p->id = $lastId + 1;
        $p->name = $request->input('name');
        $p->category = $request->input('category');
        $p->value = $request->input('value');

        //..add the newly created product into products
        $product[] = $p;
        //..update the session data
        session(['products' => $products]);
        //..redirects the application flow to product index route
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
        //..recover the data from session
        $products = session('products');

        //..find a product in products using the id
        $product = $this->arrayFind($products, $id);

        //..if a product found, retuns a view with product data
        if($product){
            return view('product.show')->with('product', $product);
        } else { 
            //..else, return an abort
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //..retry the products from session
        $products = session('products');

        //..search the product using the id
        $product = $this->arrayFind($products, $id);

        //..if product exists, return the view with data to be updated
        if($product){        
            return view('product.edit')->with('product', $product);
        } else { 
            //..else, show error 404 - not found
            abort(404);
        }
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
        //..retry the products from session
        $products = session('products');
        
        //..get the index of object that will be updated
        $i = $this->arraySearch($products, 'id', $id);
        
        //..updates the data of object 
        $products[$i]->name = $request->input('name');
        $products[$i]->category = $request->input('category');
        $products[$i]->value = $request->input('value');
        
        //..updates the session with new data
        session(['product' => $products]);
        
        //..redirects the browser to index route
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
        //..retry the products from session
        $products = session('products');
        
        //..gets the id of object using the id
        $i = $this->arraySearch($products, 'id', $id);
        
        //..if exists the id, deletes the object
        if($i >= 0){
            unset($products[$i]);
            $products = array_values($products);
            session(['products' => $products]);
        }
        //..redirect to index route to show the updated list of products
        return redirect(route('product.index'));
    }

    /**
     * Search for an object in array collection
     * @param array array The array
     * @param int id An id
     * @return object 
     */
    public function arrayFind($array, $id)
    {
        if($array){
            foreach($array as $obj){
                if($obj->id == $id){
                    return $obj;
                }
            }
            return null;
        }
    }

    /**
     * Returns the index of an object from array or -1, if the object doesn't exist.
     * @param array array The array
     * @param string key The key used to search
     * @param int search The value to search
     * 
     */
    public function arraySearch($array, $key, $search)
    {
        if($array){
            $i = 0;
            foreach($array as $obj){
                if($obj->$key == $search){
                    return $i;
                }
                $i++;
            }
            return -1;
        }
    }

    /**
     * Returns the validation rules
     */
    public function getRules(){
        return [
            'name' => 'string|required|min:5|max:100',
            'category' => 'string|required|min:5|max:100',
            'value' => 'required|numeric|between:1,90000'
        ];    
    }

    /**
     * Returns the error messages.
     */
    public function getErrorMessages(){
        return [
            'name.*' => 'O nome deve ter entre 5 e 100 caracteres',
            'category.*' => 'A categoria do produto deve ter entre 5 e 100 caracteres',
            'value.*' => 'O valor deve ser um número entre 1 e 90000'
        ];
    }

}
