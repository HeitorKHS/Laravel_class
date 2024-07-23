<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//comando para criar controller php artisan make:controller "nome"
//controller primeiro parametro é a rota e o segundo é qual controller é responsavel pela rota  
Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');

//controller passando parametro
Route::get('/produtoController/{id?}', [ProdutoController::class, 'show'])->name('produto.show');



            /*rota*/   /*Função de callback*/
Route::get('/empresa', function()
{
    return view('site/empresa');
});
//se for apenas view pode fazer de forma simplicado
Route::view('/empresa', 'site/empresa');



//Permite todo tipo de acesso http (put, delete, get, post) obs: Não é muito seguro
Route::any('/any', function()
{
    return "Permite todo tipo de acesso http (put, delete, get, post) obs: Não é muito seguro";
});



//Permite apenas acessos definidos no primeiro parametro
Route::match(['get' , 'post'], '/match', function()
{
    return "Permite apenas acessos definidos no primeiro parametro";
});



//Como funciona a passagem de parâmentros
Route::get('/produto/{id}/{cat?}', function($id, $cat = "")
{
    return "O id do produto é: ".$id."<br>"."A categoria é: ".$cat;
});



//Redirect
Route::get('/sobre', function()
{
    return redirect('/empresa');
});
//Simplificado
//primeiro parametro é qual rota que que redireciona e o segundo e para onde
Route::redirect('/sobre', '/empresa');



//Rotas nomeadas
//É bom quando para quando a rota for alterado, mas o nome não precisa 
Route::get('/news', function()
{
    return view('news');
})->name('noticias');

Route::get('/novidades', function()
{
    return redirect()->route('noticias');
});



//Grupo de rotas
/*Quando se repete o mesmo codigo de rotas varias vezes Ex: repete varias vezes o prefixo admin

Route::get('/admin/dashboard', function()
{
    return "dashboars";
});

Route::get('/admin/users', function()
{
    return "users";
});

Route::get('/admin/clientes', function()
{
    return "clientes";
});

para simplificar utilizamos grupo de rota Ex:
*/

Route::prefix('admin')->group( function()
{

    Route::get('/dashboard', function()
    {
        return "dashboars";
    });
    
    Route::get('/users', function()
    {
        return "users";
    });
    
    Route::get('/clientes', function()
    {
        return "clientes";
    });
    
});

/*Caso queira fazer para o nome da rota Ex:*/
Route::name('admin.')->group( function()
{

    Route::get('admin/dashboard', function()
    {
        return "dashboars";
    })->name('dashboard');
    
    Route::get('admin/users', function()
    {
        return "users";
    })->name('users');
    
    Route::get('admin/clientes', function()
    {
        return "clientes";
    })->name('clientes');
    
});

Route::get('teste', function()
{
    return redirect()->route('admin.users');
});

/*Da para criar grupos com prefixo e nome juntos (obs: quando utilizamos group a chave pro name é as) Ex: */
Route::group([
    'prefix' => 'admin',
    'as' => 'admin'
], function()
{

    Route::get('dashboard', function()
    {
        return "dashboars";
    })->name('dashboard');
    
    Route::get('users', function()
    {
        return "users";
    })->name('users');
    
    Route::get('clientes', function()
    {
        return "clientes";
    })->name('clientes');
    
});



