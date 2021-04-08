@extends('base')

@section('content')

    <form method="post" action="{{ route('product.store') }}">
        @csrf
        <label for="name">Nome Produto:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" > <br>
        @error('name')
            <div style="color:red">{{ $message }}</div>
        @enderror
        <label for="category">Categoria:</label>
        <input type="text" id="category" name="category" value="{{ old('category') }}" > <br>
        @error('category')
            <div style="color:red">{{ $message }}</div>
        @enderror
        <label for="value">Valor:</label>
        <input type="number" step="1" id="value" name="value" value="{{ old('value') }}" > <br>
        @error('value')
            <div style="color:red">{{ $message }}</div>
        @enderror
        <input type="submit" name="command" value="Cadastrar">
        <input type="reset" value="Limpar">
    </form>

@if ($errors->any()) 

<h3>Erros</h3>
<ul>
    @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>  
    @endforeach
</ul>

@endif



@endsection