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


    Route::get('/', function () {
        return view('auth.login');
    });

    Auth::routes();
    Auth::routes(['register' => true]);

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('invoices','InvoicesController');
    Route::resource('sections','SectionsController');
    Route::resource('products','ProductsController');
    Route::resource('InvoiceAttachments','InvoicesAttachmentsController');
    Route::resource('archive','InvoiceAchiveController');


    Route::get('section/{id}' ,'InvoicesController@getproducts' );
    Route::get('InvoicesDetails/{id}' ,'InvoicesDetailsController@edit' );
    Route::get('View_file/{invoice_number}/{file_name}' , 'InvoicesAttachmentsController@show_file');
    Route::get('download/{invoice_number}/{file_name}' , 'InvoicesAttachmentsController@get_file');
    Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');
    Route::get('edit_invoice/{id}' , 'InvoicesController@edit');

    Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');
    Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');

    Route::delete('sendToArchive','InvoicesController@sendToArchive');
    Route::get('print_invoice/{invoice_id}','InvoicesController@print_invoice');
    Route::get('export_invoice', 'InvoicesController@export');

    Route::get('Invoice_Paid','InvoicesController@Invoice_Paid');
    Route::get('Invoice_UnPaid','InvoicesController@Invoice_UnPaid');
    Route::get('Invoice_Partial','InvoicesController@Invoice_Partial');

    Route::group(['middleware' => ['auth']], function() {
        Route::resource('roles','RoleController');
        Route::resource('users','UserController');
    });

    Route::get('invoices_report' , 'InvoicesReportController@index');
    Route::post('Search_invoices' , 'InvoicesReportController@Search_invoices');

    Route::get('customers_report', 'CustomersReportController@index')->name("customers_report");

    Route::post('Search_customers', 'CustomersReportController@Search_customers');

    Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

    Route::get('/{page}', 'AdminController@index');








