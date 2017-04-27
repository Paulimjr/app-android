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
    return view('welcome');
});

/*
 * Rotas para acessar a API de serviços REST FULL de Clientes
 */
Route::group(array('prefix' => 'v1'), function()
{
    Route::group(array('prefix' => 'api'), function()
    {
        Route::group(array('prefix' => 'customer'), function()
        {
            //Rotas de listar os clientes por filtros ou não.
            Route::get('findAllCustomers', ['uses' => 'CustomerController@findAllCustomers']);
            Route::get('findCustomerById/{id}', ['uses' => 'CustomerController@findCustomerById']);
            Route::get('findCustomerByEmail/{email}', ['uses' => 'CustomerController@findCustomerByEmail']);
            ///////////////////////////////////////////////////////
            //Rotas de inserção , alteração ou exclusão de cleintes.
            Route::post('saveCustomer', ['uses' => 'CustomerController@saveCustomer']);

        });

    });
});


/*
 * Rotas para acessar a API de serviços REST FULL de bandeiras
 */
Route::group(array('prefix' => 'v1'), function()
{
    Route::group(array('prefix' => 'api'), function()
    {
        Route::group(array('prefix' => 'brands'), function()
        {
            //Rotas de listar as bandeiras por filtros ou não.
            Route::get('findAllBrands', ['uses' => 'BrandController@findAllBrands']);
            Route::get('findBrandById/{id}', ['uses' => 'BrandController@findBrandById']);
        });

    });
});


/*
 * Rotas para acessar a API de serviços REST FULL de telefones
 */
Route::group(array('prefix' => 'v1'), function()
{
    Route::group(array('prefix' => 'api'), function()
    {
        Route::group(array('prefix' => 'phones'), function()
        {
            //Rotas de listar os telefones por filtros ou não.
            Route::get('findAllPhones', ['uses' => 'PhoneController@findAllPhones']);
            Route::get('findPhoneByDd/{dd}', ['uses' => 'PhoneController@findPhoneByDd']);
            Route::get('findPhoneByNumero/{numero}', ['uses' => 'PhoneController@findPhoneByNumero']);
            Route::get('findPhoneByDdAndNumero/{dd}/{numero}', ['uses' => 'PhoneController@findPhoneByDdAndNumero']);

            //Rotas de inserção, alteração e exclusão de número de telefone.
            Route::post('savePhone', ['uses' => 'PhoneController@savePhone']);
        });

    });
});