{{-- herdar da view base --}}
{{-- 'Product' (id, name, category, value) --}}
@extends('base')

{{-- iniciando a seção content, onde o código será injetado na view base --}}
@section('content')
    <h1>Visualizando Dados do Produto</h1>    
    <hr>
    <p>ID: {{ $p->id }}</p>
    <p>Nome: {{ $p->name }}</p>
    <p>Idade {{ $p->category }}</p>
    <p>Idade {{ $p->value }}</p>

{{-- fim da seção --}}
@endsection

