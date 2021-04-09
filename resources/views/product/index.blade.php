{{-- herdando da view base --}}

@extends('base')
@section('content')
</div class="">
    <h4>CADASTRO DE PRODUTOS</h4>
    <table class="w-sm md:w-full table-auto rounded">
        <thead class="justify-between border-4">
        <tr class="bg-gray-800">
            <th class="px-16 py-2 text-gray-300">ID</th>
            <th class="px-16 py-2 text-gray-300">Produto</th>
            <th class="px-16 py-2 text-gray-300">Categoria</th>
            <th class="px-16 py-2 text-gray-300">Valor</th>
            <th class="px-16 py-2 text-gray-300" colspan="3">Comandos</th>
        </tr>
        </thead>
        <tbody class="bg-gray-200">
        @if( isset($products) )
            @foreach ($products as $product)
                <tr class="bg-white border-4 border-gray-200 text-center">
                    <td class="px-16 py-2">{{ $product->id }}</td>
                    <td class="px-16 py-2">{{ $product->name }}</td>
                    <td class="px-16 py-2">{{ $product->category }}</td>
                    <td class="px-16 py-2">R${{ $product->value }}</td>
                    <td class="px-1 py-2"><button class="focus:outline-none text-white text-sm py-2 px-5 rounded-md bg-gray-500 hover:bg-gray-600 hover:shadow-lg"> <a href="{{ route('product.show', $product->id) }}">Mostrar</a> </button></td>
                    <td class="px-1 py-2"><button class="focus:outline-none text-white text-sm py-2 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg"> <a href="{{ route('product.edit', $product->id) }}">Editar</a> </button></td>
                    <td class="px-1 py-2">
                        <form method="post" action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <input class="focus:outline-none text-white text-sm py-2 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg cursor-pointer" type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">NÃO EXISTEM DADOS PARA SEREM EXIBIDOS!</td>
            </tr>
        @endif
    </tbody>
    </table>
<div>
@endsection

