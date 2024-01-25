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
    Route::get('/', function () {
         return redirect()->route('home.index');
    });

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
    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
        Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'App\Http\Controllers\RegisterController@customRegistration')->name('register.perform');

        // stocks

        Route::get('/stocks', 'StocksController@index')->name('admin.stocks.index');
        Route::get('/stocks/addstocks', 'StocksController@addstocks')->name('admin.stocks.addstocks');
        Route::post('/stocks/store', 'StocksController@store')->name('admin.stocks.store');

        Route::get('/stocks/edit/{id}', 'StocksController@editstocks')->name('admin.stocks.edit');
        Route::post('/stocks/edit/save', 'StocksController@updatestocks')->name('admin.stocks.edit.save');
        Route::get('/stocks/delete/{id}', 'StocksController@deletestocks')->name('admin.stocks.delete');

        // categories

        Route::get('/categories', 'CategoriesController@index')->name('admin.categories.index');
        Route::get('/categories/addcategories', 'CategoriesController@addcategories')->name('admin.categories.addcats');
        Route::post('/categories/store', 'CategoriesController@store')->name('admin.categories.store');

        Route::get('/categories/edit/{id}', 'CategoriesController@editcategories')->name('admin.categories.edit');
        Route::post('/categories/edit/save', 'CategoriesController@updatecategories')->name('admin.categories.edit.save');

        Route::get('/categories/delete/{id}', 'CategoriesController@deletecategories')->name('admin.categories.delete');
        
        //items

        Route::get('/items', 'ItemsController@index')->name('admin.items.index');
        Route::get('/items/additem', 'ItemsController@additem')->name('admin.additem.index');
        Route::post('/items/store', 'ItemsController@store')->name('admin.items.store');

        Route::get('/items/edit/{id}', 'ItemsController@edititems')->name('admin.items.edit');
        Route::post('/items/edit/save', 'ItemsController@updateitem')->name('admin.items.edit.save');

        Route::get('/items/delete/{id}', 'ItemsController@deleteitems')->name('admin.items.delete');

        //units

        Route::get('/units', 'UnitsController@index')->name('admin.units.index');
        Route::get('/units/addunits', 'UnitsController@addunits')->name('admin.addunits.index');
        Route::post('/units/store', 'UnitsController@store')->name('admin.units.store');

        Route::get('/units/edit/{id}', 'UnitsController@editunits')->name('admin.units.edit');
        Route::post('/units/edit/save', 'UnitsController@updateunits')->name('admin.units.edit.save');

        Route::get('/units/delete/{id}', 'UnitsController@deleteunits')->name('admin.units.delete');

        //Requisitions
        
        Route::get('/requisitions', 'RequisitionsController@index')->name('admin.requisitions.index');
        Route::get('/requisitions/addrequisitions', 'RequisitionsController@addrequisitions')->name('admin.requisitions.addrequisitions');
        Route::post('/requisitions/store', 'RequisitionsController@store')->name('admin.requisitions.store');

        Route::get('/requisitions/edit/{id}', 'RequisitionsController@editrequisitions')->name('admin.requisitions.edit');
        Route::post('/requisitions/edit/save', 'RequisitionsController@updaterequisitions')->name('admin.requisitions.edit.save');

        Route::get('/requisitions/delete/{id}', 'RequisitionsController@deleterequisitions')->name('admin.requisitions.delete');
        Route::get('/requisitions/delete/item/{id}', 'RequisitionsController@deleteRequisitionItem')->name('admin.requisitions.delete.item');
        
        Route::get('/requisitions/view/{id}', 'RequisitionsController@viewrequisitions')->name('admin.requisitions.view');
        Route::post('/requisitions/view', 'RequisitionsController@dviewrequisitions')->name('admin.requisitions.edit.view');
        Route::get('/requisitions/print/{id}', 'RequisitionsController@requisitionsprint')->name('admin.requisition.print');
        Route::get('/requisitions', 'RequisitionsController@index')->name('admin.requisitions.index');
        Route::get('/requisitions/approved', 'RequisitionsController@approvedRequisition')->name('admin.requisitions.approved');
        Route::get('/requisitions/disapproved', 'RequisitionsController@disapprovedRequisition')->name('admin.requisitions.disapproved');;
        Route::get('/requisitions/pending', 'RequisitionsController@pendingRequisition')->name('admin.requisitions.pending');;
        //Route::get('/requisitions/stock', 'StockController@pendingRequisition')->name('admin.stock.get');
        Route::get('/requisitions/reports', 'RequisitionsController@reports')->name('admin.requisition.reports');
        //requisitions views
        Route::post('/approved-requisitions', 'RequisitionsController@approve')->name('admin.approved.index');
        Route::get('/disapproved-requisitions', 'RequisitionsController@disapprove')->name('admin.disapprove.index');
        Route::get('/requisitions/readnotif', 'RequisitionsController@markAsRead')->name('admin.requisition.markAsRead');
        
        //suppliers 

         Route::get('/suppliers', 'SuppliersController@index')->name('admin.suppliers.index');
        Route::get('/suppliers/addsuppliers', 'SuppliersController@addsuppliers')->name('admin.addsuppliers.index');
        Route::post('/suppliers/store', 'SuppliersController@store')->name('admin.suppliers.store');

        Route::get('/suppliers/edit/{id}', 'SuppliersController@editsuppliers')->name('admin.suppliers.edit');
        Route::post('/suppliers/edit/save', 'SuppliersController@updatesuppliers')->name('admin.suppliers.edit.save');

        Route::get('/suppliers/delete/{id}', 'SuppliersController@deletesuppliers')->name('admin.suppliers.delete');
        //users

         Route::get('/users', 'UsersController@index')->name('admin.users.index');
         Route::get('/users/addusers', 'UsersController@addusers')->name('admin.addusers.index');
         Route::post('/users/store', 'UsersController@store')->name('admin.users.store');

        Route::get('/users/edit/{id}', 'UsersController@editusers')->name('admin.users.edit');
        Route::post('/users/edit/save', 'UsersController@updateusers')->name('admin.users.edit.save');

        Route::get('/users/delete/{id}', 'UsersController@deleteusers')->name('admin.users.delete');

        //departments
        
         Route::get('/departments', 'DepartmentsController@index')->name('admin.departments.index');
        Route::get('/departments/adddepartments', 'DepartmentsController@adddepartments')->name('admin.adddepartments.index');
        Route::post('/departments/store', 'DepartmentsController@store')->name('admin.departments.store');

        Route::get('/departments/edit/{id}', 'DepartmentsController@editdepartments')->name('admin.departments.edit');
        Route::post('/departments/edit/save', 'DepartmentsController@updatedepartments')->name('admin.departments.edit.save');

        Route::get('/departments/delete/{id}', 'DepartmentsController@deletedepartments')->name('admin.departments.delete');

        Route::get('/reports', 'ReportsController@index')->name('admin.reports.index');
        Route::get('/reports/addreports', 'ReportsController@addreports')->name('admin.reports.addreports');
        Route::post('/reports/store', 'ReportsController@store')->name('admin.reports.store');

        Route::get('/reports/edit/{id}', 'ReportsController@editreports')->name('admin.reports.edit');
        Route::post('/reports/edit/save', 'ReportsController@updatereports')->name('admin.reports.edit.save')
        ;

        Route::get('/reports/delete/{id}', 'ReportsController@deletereports')->name('admin.reports.delete');
        Route::get('/reports/view/{id}', 'ReportsController@viewreports')->name('admin.reports.view');
        Route::post('/reports/view', 'ReportsController@viewreports')->name('admin.reports.edit.view');
        Route::get('/reports/print/{id}', 'ReportsController@reportsprint')->name('admin.reports.print');
        Route::get('/reports/department', 'ReportsController@department')->name('admin.reports.department');


         Route::get('/divisions', 'DivisionsController@index')->name('admin.divisions.index');
        Route::get('/divisions/adddivisions', 'DivisionsController@adddivisions')->name('admin.adddivisions.index');
        Route::post('/divisions/store', 'DivisionsController@store')->name('admin.divisions.store');

        Route::get('/divisions/edit/{id}', 'DivisionsController@editdivisions')->name('admin.divisions.edit');
        Route::post('/divisions/edit/save', 'DivisionsController@updatedivisions')->name('admin.divisions.edit.save');

        Route::get('/divisions/delete/{id}', 'DivisionsController@deletedivisions')->name('admin.divisions.delete');
        Route::get('/divisions/view/{id}', 'DivisionsController@viewdivisions')->name('admin.divisions.view');
        Route::post('/divisions/view', 'DivisionsController@viewdivisions')->name('admin.divisions.edit.view');
    });

    // USER
    
    Route::group(['middleware' => ['user'], 'prefix'=> 'employee'], function() {
        Route::get('/', 'User\HomeController@index')->name('user.index');
  
    });

            //Requisitions
        
        Route::get('/user/requisitions', 'User\RequisitionsController@index')->name('employee.requisition.index');
        Route::get('/user/requisitions/add', 'User\RequisitionsController@addrequisitions')->name('employee.requisition.add');
        Route::post('/user/requisitions/store', 'User\RequisitionsController@store')->name('employee.requisition.store');
        Route::get('/user/requisitions/pending', 'User\RequisitionsController@pending')->name('employee.requisition.pending');
        Route::get('/user/requisitions/approved', 'User\RequisitionsController@approved')->name('employee.requisition.approved');
        Route::get('/user/requisitions/disapproved', 'User\RequisitionsController@disapproved')->name('employee.requisition.disapproved');

        Route::get('/user/stockCard', 'User\StockCardController@index')->name('employee.stockCard.index');

        Route::get('/user/requisitions/edit/{id}', 'User\RequisitionsController@editrequisitions')->name('employee.requisition.edit');
        Route::post('/user/requisitions/edit/save', 'User\RequisitionsController@updaterequisitions')->name('employee.requisition.edit.save');

        Route::get('/employee/requisitions/delete/{id}', 'User\RequisitionsController@deleterequisitions')->name('employee.requisition.delete');
        Route::get('/employee/requisitions/delete/item/{id}', 'User\RequisitionsController@deleteRequisitionItem')->name('employee.requisitions.delete.item');

        Route::get('/user/requisitions/view/{id}', 'User\RequisitionsController@viewrequisitions')->name('employee.requisition.view');
        Route::post('/user/requisitions/view', 'User\RequisitionsController@viewrequisitions')->name('employee.requisition.edit.view');
        Route::get('/user/requisitions/print/{id}', 'User\RequisitionsController@requisitionsprint')->name('employee.requisition.print');
        
        Route::get('/user/approved/notification/{id}', 'User\RequisitionsController@approvedNotif')->name('employee.approved.notification');
        Route::get('/user/disapproved/notification/{id}', 'User\RequisitionsController@disapprovedNotif')->name('employee.disapproved.notification');
        Route::get('/user/requisitions/items/{id}', 'User\RequisitionsController@requisition_items')->name('employee.requisition.items');


        // PENDING

          Route::get('/user/pendings', 'PendingsController@index')->name('employee.pendings.index');
        Route::get('/user/pendings/addpendings', 'PendingsController@addpendings')->name('employee.addpendings.index');
        Route::post('/user/pendings/store', 'PendingsController@store')->name('employee.pendings.store');

        Route::get('/user/pendings/edit/{id}', 'PendingsController@editpendings')->name('employee.pendings.edit');
        Route::post('/user/pendings/save', 'PendingsController@updatependings')->name('employee.pendings.edit.save');

        Route::get('/user/pendings/delete/{id}', 'PendingsController@deletependings')->name('employee.pendings.delete');



});