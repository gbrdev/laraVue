@extends('base')

@section('content')

    <form method="post" action="{{ route('product.update', $product->id ) }}">
        @csrf
        @method('PUT')
        <label for="name">Nome Produto:</label>
        <input value="{{ $product->name }}" type="text" name="name" id="name" required> <br>
        <label for="category">Nome Produto:</label>
        <input value="{{ $product->category }}" type="text" name="category" id="category" required> <br>
        <label for="value">Valor:</label>
        <input value="{{ $product->value }}" type="number" step="1" id="value" name="value" required> <br>
        <input type="submit" name="command" value="Salvar">
        <input type="reset" value="Limpar">
    </form>

@endsection