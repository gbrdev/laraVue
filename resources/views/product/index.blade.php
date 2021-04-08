{{-- herdando da view base --}}

@extends('base')
@section('content')
    <table border="1">
        <tr>
            <th>ID</th>  <th>Produto</th>  <th>Categoria</th> <th>Valor</th>
            <th colspan="3">Comandos</th>
        </tr>
        @if( isset($products) )
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category }}</td>
                    <td>R${{ $product->value }}</td>
                    <td><button> <a href="{{ route('product.show', $product->id) }}">Mostrar</a> </button></td>
                    <td><button> <a href="{{ route('product.edit', $product->id) }}">Editar</a> </button></td>
                    <td>
                        <form method="post" action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>   
            @endforeach
        @else
            <tr>
                <td colspan="6">NÃO EXISTEM DADOS PARA SEREM EXIBIDOS!</td>
            </tr>
        @endif
    </table>
@endsection

