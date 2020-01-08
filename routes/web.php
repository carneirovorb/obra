<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::guest()) {
        return redirect('login');        
    } 
    return redirect('works');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/{user_id}/profile', 'UserController@edit');
        Route::put('/{user_id}/profile', 'UserController@update');

        Route::group(['middleware' => 'permission'], function () {
            Route::get('/', 'UserController@index');  // Lista Todos os Usuarios
            Route::get('/create', 'UserController@create'); // Abre form para cadastrar novo usuario
            Route::post('/', 'UserController@store');  // Salva novo usuario no banco
            Route::get('{user_id}/edit', 'UserController@edit'); // Abre form para editar usuario, referente ao ID
            Route::put('/{user_id}', 'UserController@update'); // Salva no banco a edição de usuario
            Route::delete('/{user_id}', 'UserController@destroy'); // Remove 1 usuario, referente ao ID
            Route::get('/{user_id}', 'UserController@show'); // Mostra informações de Apenas 1 usuario, referente ao ID                
        });
    });

    Route::group(['prefix' => 'works'], function () {
        Route::group(['middleware' => 'permission'], function () {
            Route::get('/{work_id}/accounts', 'AccountController@show');
            Route::get('/{work_id}/accounts/create', 'AccountController@create');
            Route::get('/{work_id}/accounts/{account_id}/edit', 'AccountController@edit');
            Route::post('{work_id}/accounts', 'AccountController@store');
            Route::put('/{work_id}/accounts/{account_id}', 'AccountController@update');
            Route::delete('/{work_id}/accounts/{account_id}', 'AccountController@destroy');

            Route::get('/{work_id}/transfers/create', 'TransferController@create');
            Route::get('/{work_id}/transfers', 'TransferController@index');
            Route::get('/{work_id}/transfers/{transfer_id}/edit', 'TransferController@edit');
            Route::post('/{work_id}/transfers', 'TransferController@store');
            Route::put('/{work_id}/transfers/{transfer_id}', 'TransferController@update');
            Route::delete('/{work_id}/transfers/{transfer_id}', 'TransferController@destroy');

            Route::get('/{work_id}/financial/create', 'FinancialController@create');
            Route::get('/{work_id}/financial', 'FinancialController@index');
            Route::get('/{work_id}/financial/{financial_id}', 'FinancialController@show');
            Route::get('/{work_id}/financial/{financial_id}/edit', 'FinancialController@edit');
            Route::post('/{work_id}/financial', 'FinancialController@store');
            Route::put('/{work_id}/financial/{financial_id}', 'FinancialController@update');
            Route::delete('/{work_id}/financial/{financial_id}', 'FinancialController@destroy');

            Route::get('/{work_id}/report', 'ReportController@show');
            Route::get('/{work_id}/report/{report_id}', 'ReportController@download');
            Route::post('/{work_id}/report', 'ReportController@upload');
            Route::delete('/{work_id}/report/{report_id}', 'ReportController@destroy');
        });
        
        Route::get('/searchByFolder', function() {
            return view('works.folders');
        });
        Route::get('/', 'WorkController@index'); // Lista de Todas as Obras
        Route::get('/create', 'WorkController@create'); // Abre form para cadastrar nova obra
        Route::post('/', 'WorkController@store'); // Salva nova obra no banco
        Route::post('/search', 'WorkController@searchByName');
        Route::post('/searchByFolder', 'WorkController@searchByFolder');
        Route::get('/{work_id}/edit', 'WorkController@edit')->middleware('permission'); // Abre form para editar obra, referente ao ID
        Route::put('/{work_id}', 'WorkController@update')->middleware('permission'); // Salva no banco a edição da obra
        Route::delete('/{work_id}', 'WorkController@destroy')->middleware('permission'); // Remove 1 obra, referente ao ID
        Route::get('/{work_id}', 'WorkController@show')->middleware('permission'); // Mostra informações de apenas 1 obra, referente ao ID
        Route::get('/{work_id}/users', 'WorkController@editPermissions')->middleware('permission'); // Mostra formulário com a lista de usuários cadastrados no sistema para que o usuario atual idique quem pode não ver, somente ver, e ver e editar a obra
        Route::post('/{work_id}/users', 'WorkController@updatePermissions')->middleware('permission');
    });
});

Route::fallback('HomeController@notFound');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

