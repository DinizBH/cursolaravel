
``` Deixei como md mas na verdade é o código módificado para meu estudo.
<?php

use Illuminate\Support\Facades\Route;

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

// rota padrão do site
Route::get('/', function () {
    return view('welcome');
});

// rota gerada na pasta /views
Route::get('/empresa', function(){
    return view('site/empresa');
});

// rota insegura e incomum mas existe
Route::any('/any',function(){
    return "Permite todo tipo de rota HTTP (get, put, post, delete)";
});

// rota segura onde definimos requisições permitidas
Route::match(['get','post'],'/match',function(){
    return "Permite apenas acessos definidos por parametros" ;
});

// rota dinâmica usando parametros
Route::get('/produto/{id}/{cat?}',function($id , $cat = ''){
   return 'O id do produto é: '. $id . '<hr>'  . 'A categoria do produto é: '. $cat;
});

// forma extensa de redirect
Route::get('/sobre',function(){
    return redirect('/empresa') ;
});

// forma simples de redirect
Route::redirect('/about','sobre');

// Outra forma de rota, mas apenas para view ou seja, página estática
Route::view('/contato','site/contato');

// Rotas nomeadas
Route::view('/news', function(){
    return view('news');
})->name('noticias');

// Redirecionamento para uma rotas nomeada
Route::get('/novidades',function(){
    return redirect('')->route('noticias');
});

//Agrupar rotas por prefixo -> omitir slug repetitivo e simplificar o código
Route::prefix('admin')->group(function(){

    Route::get('dashboard',function(){ //por exemplo admin/dashboard
        return 'dashboard' ;
    });

    Route::get('users',function(){
        return 'users' ;
    });

    Route::get('clientes',function(){
        return 'clientes' ;
    });
});


//Agrupar rotas por rotas nomeadas
Route::name('admin.')->group(function(){

    Route::get('admin/dashboard2',function(){ //por exemplo admin/dashboard2
        return 'dashboard2';
    })->name('dashboard2');

    Route::get('admin/users2',function(){
        return 'users2';
    })->name('users2');

    Route::get('admin/clientes2',function(){
        return 'clientes2';
    })->name('clientes2');
});

//Agrupar rotas de ambas as formas
Route::group([
    'prefix'=>'admin',
    'as'=> 'admin.'
], function(){

    Route::get('dashboard3',function(){
        return 'dashboard3';
    })->name('dashboard3');

    Route::get('users3',function(){
        return 'users3';
    })->name('users3');

    Route::get('clientes3',function(){
        return 'clientes3';
    })->name('clientes3');
});
?>
```
