-   [x] 1. Abir o prompt de comando (ou PowerShell), navegar até uma pasta de sua preferência e criar um projeto com o comando:
       laravel new [nome-do-projeto]

-   [x] 2. Abrir o VS Code e abrir a pasta do projeto (File/Open Folder);

-   [x] 3. Iniciar o servidor do Laravel: abrir o menu/comando Terminal/New Terminal e digitar o seguinte comando: php artisan serve

-   [x] 4. Abrir o navegador: http://127.0.0.1:8000 para verificar;

-   [x] 5. Imaginar a classe de dados 'Product' (id, name, category, value) - O CRUD será criado com base nessa estrutura;

-   [x] 6. Criar o controlador com os métodos CRUD usando o comando:

```shell
php artisan make:controller ProductCtr --resource
```

-   [x] -> Isso irá criar o controlador ProductCtr na pasta app/Http/Controllers - verifique!

-   [x] 7. Abrir o arquivo routes/web.php e associar as rotas CRUD ao controlador. Use o seguinte código:

```php
Route::resource('/product', ProductController::class);
```

Agora verifique as rotas. Use o seguinte comando para verificar que as rotas para os métodos CRUD do controlador já estão definidas:

```shell
php artisan route:list
```

-   [x] 8. Criar uma view 'base' para usar como herança. Usando a IDE do VS Code, navegue até a pasta app/resources/views e crie um arquivo chamado 'base.blade.php'. O código desse arquivo pode ser idêntico ao exemplo trabalhado em sala de aula.

-   [x] 9. Na pasta app/resources/views, crie uma pasta chamada 'product'

-   [x] 10. Na pasta app/resources/views/product crie os seguintes arquivos que serão usados como views:

    > index.blade.php
    > create.blade.php
    > edit.blade.php
    > show.blade.php

O código dessas views se resume a herdar a view base e definir seu conteúdo específico (use como exemplo o código trabalhado em sala de aula)

##### 11. Sugiro iniciar a implementação assim:

VÁ ATÉ A SEGUNDA PARTE DESTE ROTEIRO E CRIE O BANCO DE DADOS!

Codificar a view index.blade.php - codificar o método index() do controlador;

Codificar a view show.blade.php - codificar o método show(id) do controlador;

Codificar a view create.blade.php - codificar o método create() do controlador;

Codificar o método store(Request $request) do controlador;

    Codificar a view edit.blade.php
    codificar o método update(Request $request, $id) do controlador;
    Codificar o método destroy($id) do controlador;

PARTE 2 - CRIANDO O BANCO DE DADOS

-   [x] 1. Inicie o serviço do banco de dados MySQL

-   [x] 2. Conecte ao banco de dados e crie o BD a ser usado com o comando
       ` mysql -u root -p (digite a senha)`

-   [x] 3. Criar o banco de dados com o comando MySQL:
       ` create database [nome_banco_de_dados]; <enter>`

-   [x] 4. configurar a conexão com o banco de dados no arquivo .env - esse arquivo fica na raiz: POSTGRESQL

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravue
DB_USERNAME=postgres
DB_PASSWORD=010203

-   [x] 5.  Criar o model e a migration associada com o comando:
        php artisan make:model [NomeModel] -m <enter>

            - O nome do model deve iniciar com a letra maiúscula.
            - O model criado fica na pasta /app
            - A migration fica na pasta /database/migrations

-   [x] 6. Codifique a migration usando como exemplo o projeto trabalhado em sala de aula;

-   [x] 7. Execute a migration para criar a tabela no banco de dados. Use o comando:
       `php artisan migrate`

-   [x] 8. Para testar se o model está interagindo corretamente com o BD, use o Tinker. Abra o prompt, vá até a pasta do seu projeto e digite o comando:
       php artisan tinker

9. Agora basta ajustar o controller que, atualmente, está gravando tudo na sessão. Mude o nome do seu controlador, adicionando o sufixo '.old' no arquivo. Depois crie um novo controlador CRUD usando o comando:
   php artisan make:controller [NomeControllador] --resource

10. Ajuste os métodos do controlador usando como exemplo projeto trabalhado em sala de aula.

Good Job!

### Eloquent -> Thinker

Definindo um model
$c = new Client();

Quais dados? Nome e idade....
$c->name = 'Um nome';
$c->age = 99;

Salvar os dados
$c->save();

Carregar os dados para alterar
$c = Client::find(1);

Alterar
$c->name = 'Davi Terradas Silva';
$c->age = 8;
$c->save();

Listagem
$clients = Client::all(); (Retorna uma lista por ordem de inserção)
$clients = Client::orderBy('name')->get(); (por ordem alfabética)

Filtros
$clients = Client::where('name', 'like', 'G%')->orderBy('name')->get();

Exclusão
$c = Client::find(id);
$c->delete();
$p->name='PlayStation 5';$p->category='Video Games;'$p->value=2000;
