<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        
        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'App\Http\Controllers\RegisterController@customRegistration')->name('register.perform');


        // stocks

        Route::get('/stocks', 'StocksController@index')->name('stocks.index');
        Route::get('/stocks/addstocks', 'StocksController@addstocks')->name('stocks.addstocks');
        Route::post('/stocks/store', 'StocksController@store')->name('stocks.store');

        Route::get('/stocks/edit/{id}', 'StocksController@editstocks')->name('stocks.edit');
        Route::post('/stocks/edit/save', 'StocksController@updatestocks')->name('stocks.edit.save');
        Route::get('/stocks/delete/{id}', 'StocksController@deletestocks')->name('stocks.delete');

        // categories

        Route::get('/categories', 'CategoriesController@index')->name('categories.index');
        Route::get('/categories/addcategories', 'CategoriesController@addcategories')->name('categories.addcats');
        Route::post('/categories/store', 'CategoriesController@store')->name('categories.store');

        Route::get('/categories/edit/{id}', 'CategoriesController@editcategories')->name('categories.edit');
        Route::post('/categories/edit/save', 'CategoriesController@updatecategories')->name('categories.edit.save');

        Route::get('/categories/delete/{id}', 'CategoriesController@deletecategories')->name('categories.delete');
        
        //items

        Route::get('/items', 'ItemsController@index')->name('items.index');
        Route::get('/items/additem', 'ItemsController@additem')->name('additem.index');
        Route::post('/items/store', 'ItemsController@store')->name('items.store');

        Route::get('/items/edit/{id}', 'ItemsController@edititems')->name('items.edit');
        Route::post('/items/edit/save', 'ItemsController@updateitem')->name('items.edit.save');

        Route::get('/items/delete/{id}', 'ItemsController@deleteitems')->name('items.delete');

        //units

        Route::get('/units', 'UnitsController@index')->name('units.index');
        Route::get('/units/addunits', 'UnitsController@addunits')->name('addunits.index');
        Route::post('/units/store', 'UnitsController@store')->name('units.store');

        Route::get('/units/edit/{id}', 'UnitsController@editunits')->name('units.edit');
        Route::post('/units/edit/save', 'UnitsController@updateunits')->name('units.edit.save');

        Route::get('/units/delete/{id}', 'UnitsController@deleteunits')->name('units.delete');

        //Requisitions
        
        Route::get('/requisitions', 'RequisitionsController@index')->name('requisitions.index');
        Route::get('/requisitions/addrequisitions', 'RequisitionsController@addrequisitions')->name('requisitions.addrequisitions');
        Route::post('/requisitions/store', 'RequisitionsController@store')->name('requisitions.store');

        Route::get('/requisitions/edit/{id}', 'RequisitionsController@editrequisitions')->name('requisitions.edit');
        Route::post('/requisitions/edit/save', 'RequisitionsController@updaterequisitions')->name('requisitions.edit.save')
        ;

        Route::get('/requisitions/delete/{id}', 'RequisitionsController@deleterequisitions')->name('requisitions.delete');
        Route::get('/requisitions/view/{id}', 'RequisitionsController@viewrequisitions')->name('requisitions.view');
        Route::post('/requisitions/view', 'RequisitionsController@dviewrequisitions')->name('requisitions.edit.view');
        Route::get('/requisitions/print/{id}', 'RequisitionsController@requisitionsprint')->name('requisition.print');

        // Route::post('/requisitions-items/save', 'RequisitionsController@save')->name('requisitions_items.save');


        
        //suppliers 

         Route::get('/suppliers', 'SuppliersController@index')->name('suppliers.index');
        Route::get('/suppliers/addsuppliers', 'SuppliersController@addsuppliers')->name('addsuppliers.index');
        Route::post('/suppliers/store', 'SuppliersController@store')->name('suppliers.store');

        Route::get('/suppliers/edit/{id}', 'SuppliersController@editsuppliers')->name('suppliers.edit');
        Route::post('/suppliers/edit/save', 'SuppliersController@updatesuppliers')->name('suppliers.edit.save');

        Route::get('/suppliers/delete/{id}', 'SuppliersController@deletesuppliers')->name('suppliers.delete');
        //users

        Route::get('/users', 'UsersController@index')->name('users.index');
        Route::get('/users/addusers', 'UsersController@addusers')->name('addusers.index');
        Route::post('/users/store', 'UsersController@store')->name('users.store');

        Route::get('/users/edit/{id}', 'UsersController@editusers')->name('users.edit');
        Route::post('/users/edit/save', 'UsersController@updateusers')->name('users.edit.save');

        Route::get('/users/delete/{id}', 'UsersController@deleteusers')->name('users.delete');

        //departments
        
         Route::get('/departments', 'DepartmentsController@index')->name('departments.index');
        Route::get('/departments/adddepartments', 'DepartmentsController@adddepartments')->name('adddepartments.index');
        Route::post('/departments/store', 'DepartmentsController@store')->name('departments.store');

        Route::get('/departments/edit/{id}', 'DepartmentsController@editdepartments')->name('departments.edit');
        Route::post('/departments/edit/save', 'DepartmentsController@updatedepartments')->name('departments.edit.save');

        Route::get('/departments/delete/{id}', 'DepartmentsController@deletedepartments')->name('departments.delete');

        Route::get('/reports', 'ReportsController@index')->name('reports.index');
        Route::get('/reports/addreports', 'ReportsController@addreports')->name('reports.addreports');
        Route::post('/reports/store', 'ReportsController@store')->name('reports.store');

        Route::get('/reports/edit/{id}', 'ReportsController@editreports')->name('reports.edit');
        Route::post('/reports/edit/save', 'ReportsController@updatereports')->name('reports.edit.save')
        ;

        Route::get('/reports/delete/{id}', 'ReportsController@deletereports')->name('reports.delete');
        Route::get('/reports/view/{id}', 'ReportsController@viewreports')->name('reports.view');
        Route::post('/reports/view', 'ReportsController@viewreports')->name('reports.edit.view');
        Route::get('/reports/print/{id}', 'ReportsController@reportsprint')->name('reports.print');
    });

    // USER
    
    Route::group(['middleware' => ['user'], 'prefix'=> 'employee'], function() {
        Route::get('/', 'User\HomeController@index')->name('user.index');
  
    });

            //Requisitions
        
       Route::get('/user/requisitions', 'User\RequisitionsController@index')->name('employee.requisition.index');
        Route::get('/user/requisitions/add', 'User\RequisitionsController@addrequisitions')->name('employee.requisition.add');
        Route::post('/user/requisitions/store', 'User\RequisitionsController@store')->name('employee.requisition.store');

        Route::get('/user/requisitions/edit/{id}', 'User\RequisitionsController@editrequisitions')->name('employee.requisition.edit');
        Route::post('/user/requisitions/edit/save', 'User\RequisitionsController@updaterequisitions')->name('employee.requisition.edit.save')
        ;

        Route::get('/user/requisitions/delete/{id}', 'User\RequisitionsController@deleterequisitions')->name('employee.requisition.delete');
        Route::get('/user/requisitions/view/{id}', 'User\RequisitionsController@viewrequisitions')->name('employee.requisition.view');
        Route::post('/user/requisitions/view', 'User\RequisitionsController@viewrequisitions')->name('employee.requisition.edit.view');
        Route::get('/user/requisitions/print/{id}', 'User\RequisitionsController@requisitionsprint')->name('employee.requisition.print');

        // PENDING

          Route::get('/user/pendings', 'PendingsController@index')->name('employee.pendings.index');
        Route::get('/user/pendings/addpendings', 'PendingsController@addpendings')->name('employee.addpendings.index');
        Route::post('/user/pendings/store', 'PendingsController@store')->name('employee.pendings.store');

        Route::get('/user/pendings/edit/{id}', 'PendingsController@editpendings')->name('employee.pendings.edit');
        Route::post('/user/pendings/save', 'PendingsController@updatependings')->name('employee.pendings.edit.save');

        Route::get('/user/pendings/delete/{id}', 'PendingsController@deletependings')->name('employee.pendings.delete');
}); 