@extends('base')

@section('content')
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Cadastro</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Cadastrando um novo produto</p>
          </div>
          <form method="post" action="{{ route('product.store') }}">
            @csrf
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
              <div class="p-2 w-1/1">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600">Nome Produto:</label>
                  <input class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" type="text" name="name" id="name" value="{{ old('name') }}">
                  @error('name')
                    <div style="color:red">{{ $message }}</div>
                  @enderror

                  <label for="category" class="leading-7 text-sm text-gray-600">Categoria:</label>
                  <input class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" type="text" id="category" name="category" value="{{ old('category') }}">
                  @error('category')
                    <div style="color:red">{{ $message }}</div>
                  @enderror

                  <label for="value" class="leading-7 text-sm text-gray-600">Valor:</label>
                  <input class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" type="number" step="1" id="value" name="value" value="{{ old('value') }}" >
                  @error('value')
                    <div style="color:red">{{ $message }}</div>
                  @enderror

                  <input class="mt-4 mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg cursor-pointer" type="submit" name="command" value="Salvar">
                  <input class="mt-4 mx-auto text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg cursor-pointer" type="reset" value="Limpar">
                </div>
              </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </section>


      @if ($errors->any()) 

<h3>Erros</h3>
<ul>
    @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>  
    @endforeach
</ul>

@endif
@endsection