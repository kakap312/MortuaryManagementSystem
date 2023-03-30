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

// route for corpse feature
Route::get('/', function(){
    return "hello";
});
Route::post('/userdashboard/createcorp','CorpController@registerCorp')->name('createcorp');
Route::post('/userdashboard/update','CorpController@updateCorp')->name('updatecorp');
Route::get('/userdashboard/fetchcorps','CorpController@viewAllCorps')->name('fetchcorps');
Route::get('/userdashboard/totalcorpse','CorpController@totalCorpse')->name('totalcorpse');
Route::get('/userdashboard/fetchfridges','CorpController@viewAllFridges')->name('fetchfridges');
Route::post('/userdashboard/availableslot','CorpController@viewAvailableSlot')->name('fetchavailableslots');
Route::get('/userdashboard/fetchslot','CorpController@viewSlots')->name('fetchslots');
Route::post('/userdashboard/freeslot','CorpController@freeSlot')->name('freeslot');
Route::post('/userdashboard/searchcorp','CorpController@searchcorp')->name('searchcorp');
Route::post('/userdashboard/deletecorp','CorpController@deletecorp')->name('deletecorp');
Route::post('/userdashboard/namevalidator','CorpController@validateName')->name('validatename');
Route::post('/userdashboard/validateAge','CorpController@validateAge')->name('validateage');
Route::post('/userdashboard/validateremarks','CorpController@validateRemarks')->name('validateremark');
Route::post('/userdashboard/validatecontacr','CorpController@validateContact')->name('validatecontact');

// route for billing feature
Route::post('/userdashboard/createbilling','BillingController@createBill')->name('createbill');
Route::post('/userdashboard/viewbillings','BillingController@viewBills')->name('viewbills');
Route::post('/userdashboard/viewbillingsbycorpsid','BillingController@viewBillsByCorpseId');
Route::post('/userdashboard/deletebill','BillingController@deleteBillById')->name('deletebill');
Route::post('/userdashboard/searchbill','BillingController@searchBillById')->name('searchbill');
//Account Route
Route::post('/account/login','AccountController@accountLogin')->name('userlogin');
Route::get('/account','AccountController@renderAccountView')->name('account');
Route::get('/logout',function(){
    Session::forget('username');
    return  redirect()->route('account');
})->name('logout');
Route::post('/account/validateusername','AccountController@validateUsername')->name('username');
Route::post('/account/validatepassword','AccountController@validatePassword')->name('validatepassword');
Route::get('/userdashboard',function(){
    if(Session::get('username')){
        return view('dashboard.userdashboard');
    }else{
       return  redirect()->route('account');
    }
    
})->name('dbroute');

// route for services 
Route::get('/userdashboard/fetchservices','ServiceController@viewServices')->name('fetchservices');