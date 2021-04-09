@extends('base')

@section('content')
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Alteração</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Alterando um produto</p>
          </div>
          <form method="post" action="{{ route('product.update', $product->id ) }}">
            @csrf
            @method('PUT')
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
              <div class="p-2 w-1/1">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600">Nome Produto:</label>
                  <input class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ $product->name }}" type="text" name="name" id="name" required>

                  <label for="name" class="leading-7 text-sm text-gray-600">Categoria:</label>
                  <input class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ $product->category }}" type="text" name="category" id="category" required>

                  <label for="name" class="leading-7 text-sm text-gray-600">Valor:</label>
                  <input class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ $product->value }}" type="number" step="1" id="value" name="value" required>

                  <input class="mt-4 mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg cursor-pointer" type="submit" name="command" value="Salvar">
                  <input class="mt-4 mx-auto text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg cursor-pointer" type="reset" value="Restaurar">
                </div>
              </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </section>
@endsection