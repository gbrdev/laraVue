{{-- herdar da view base --}}
{{-- 'Product' (id, name, category, value) --}}
@extends('base')

{{-- iniciando a seção content, onde o código será injetado na view base --}}
@section('content')
</div>
    <h1>Visualizando Dados do Produto</h1>    
    <hr>
    <p>ID: {{ $product->id }}</p>
    <p>Nome: {{ $product->name }}</p>
    <p>Idade {{ $product->category }}</p>
    <p>Idade {{ $product->value }}</p>

{{-- fim da seção --}}
@endsection

