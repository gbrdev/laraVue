<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ asset('./css/app.css') }}" rel="stylesheet">
</head>
<body>
    <section class="min-h-screen bg-gray-50 ">
        <header class="sticky top-0 bg-white shadow">
            <div class="flex items-center justify-between p-4 mx-auto max-w-7xl">
                <h1 class="text-lg font-bold">{{ env('APP_NAME') }}</h1>
                <ol class="w-lg flex justify-between">
                    <li class="mx-2"> <a href=" {{ route('product.index') }} ">Início</a></li>
                    <li class="mx-2"> <a href=" {{ route('product.create') }} ">Novo Produto</a> </li>
                </ol>
            </div>
        </header>
        <main class="p-4 mx-auto max-w-7xl">
            <div class="mx-auto prose content">
                {{-- a diretiva yield injeta um código na view --}}
                @yield('content') 
            </div> 
        </main>
    </section>  
    <footer>
        <small>
            <p>{{ env('APP_NAME') }}</p>
        </small>            
    </footer>
</body>
</html>