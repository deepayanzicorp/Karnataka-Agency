<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\allUsers\AllUsersController;
use App\Http\Controllers\allUsers\companyDetails\CompanyDetailsController;
use App\Http\Controllers\allUsers\BuyerMasters\BuyerMasterController;
use App\Http\Controllers\allUsers\SellerMasters\SellerMasterController;
use App\Http\Controllers\allUsers\TaxMasters\TaxMasterController;


// use App\Http\Controllers\allUsers\TestDemoController;


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



Route::group(['prefix' => '', 'namespace' => 'allUsers'], function (){
    Route::get('/', function (){
        return Redirect::Route('allUsers.login');
    });
    Route::get('/login', [AllUsersController::class, 'login'])->name('allUsers.login');
	Route::post('/login', [AllUsersController::class, 'login'])->name('allUsers.login');
});


/*______________________________________________________________________
                                                                       
        All Users Routes                                                     
______________________________________________________________________*/

Route::group(['prefix' => '', 'namespace' => 'allUsers', 'middleware' => 'allUsers'], function (){
    Route::get('dashboard', [AllUsersController::class, 'dashboard'])->name('allUsers.dashboard');
    Route::get('logout', [AllUsersController::class, 'logout'])->name('allUsers.logout');

    Route::get('company-details', [AllUsersController::class, 'companyDetails'])->name('allUsers.companyDetails');
    Route::get('channel-partner', [AllUsersController::class, 'channelPartner'])->name('allUsers.channelPartner');
    Route::get('seller-master', [AllUsersController::class, 'sellerMaster'])->name('allUsers.sellerMaster');
    Route::get('buyer-master', [AllUsersController::class, 'buyerMaster'])->name('allUsers.buyerMaster');
    Route::get('grade-master', [AllUsersController::class, 'gradeMaster'])->name('allUsers.gradeMaster');
    Route::get('item-master', [AllUsersController::class, 'itemMaster'])->name('allUsers.itemMaster');
    Route::get('tax-master', [AllUsersController::class, 'taxMaster'])->name('allUsers.taxMaster');
    Route::get('distance-master', [AllUsersController::class, 'distanceMaster'])->name('allUsers.distanceMaster');
    Route::get('item-price-list-master', [AllUsersController::class, 'itemPriceListMaster'])->name('allUsers.itemPriceListMaster');
    Route::get('freight-price-list-master', [AllUsersController::class, 'freightPriceListMaster'])->name('allUsers.freightPriceListMaster');

    // Company Details
    Route::group(['prefix' => 'company-details', 'namespace' => 'companyDetails', 'as' => 'companyDetails.'], function(){
        // Route::get('/', [CompanyDetailsController::class, 'list'])->name('list');     
        Route::get('getall', [CompanyDetailsController::class, 'get_company_list'])->name('get_company_list');        
        Route::post('insert', [CompanyDetailsController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [CompanyDetailsController::class, 'edit'])->name('edit');
        // Route::put('update', [CompanyDetailsController::class, 'update'])->name('update');
        Route::put('update', [CompanyDetailsController::class, 'update'])->name('update');
        Route::get('delete/{id}', [CompanyDetailsController::class, 'edit']);
        Route::put('delete', [CompanyDetailsController::class, 'destroy'])->name('delete');
        Route::get('search', [CompanyDetailsController::class, 'search'])->name('search');
    });

    // Buyer Master
    Route::group(['prefix' => 'buyer-master', 'namespace' => 'BuyerMasters', 'as' => 'buyerMaster.'], function(){
        // Route::get('/', [BuyerMasterController::class, 'list'])->name('list');        
        Route::get('list', [BuyerMasterController::class, 'list'])->name('list');        
        Route::post('insert', [BuyerMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [BuyerMasterController::class, 'edit'])->name('edit');
        Route::put('update', [BuyerMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [BuyerMasterController::class, 'edit']);
        Route::put('delete', [BuyerMasterController::class, 'destroy'])->name('delete');
        Route::get('search', [BuyerMasterController::class, 'search'])->name('search');

        // For Shipping
        Route::get('listShipping', [BuyerMasterController::class, 'listShipping'])->name('listShipping');        
        Route::post('insertShipping', [BuyerMasterController::class, 'insertShipping'])->name('insertShipping');
        Route::get('editShipping/{id}', [BuyerMasterController::class, 'editShipping'])->name('editShipping');
        Route::put('updateShipping', [BuyerMasterController::class, 'updateShipping'])->name('updateShipping');
        Route::get('deleteShipping/{id}', [BuyerMasterController::class, 'editShipping']);
        Route::put('deleteShipping', [BuyerMasterController::class, 'destroyShipping'])->name('deleteShipping');

        
        // Route::get('listShipping', [TestDemoController::class, 'listShipping'])->name('listShipping'); 
    });

    // Seller Master
    Route::group(['prefix' => 'seller-master', 'namespace' => 'SellerMasters', 'as' => 'sellerMaster.'], function(){
        Route::get('list', [SellerMasterController::class, 'list'])->name('list');        
        Route::post('insert', [SellerMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [SellerMasterController::class, 'edit'])->name('edit');
        Route::put('update', [SellerMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [SellerMasterController::class, 'edit']);
        Route::put('delete', [SellerMasterController::class, 'destroy'])->name('delete');
        Route::get('search', [SellerMasterController::class, 'search'])->name('search');

        // For Shipping
        Route::get('listShipping', [SellerMasterController::class, 'listShipping'])->name('listShipping');        
        Route::post('insertShipping', [SellerMasterController::class, 'insertShipping'])->name('insertShipping');
        Route::get('editShipping/{id}', [SellerMasterController::class, 'editShipping'])->name('editShipping');
        Route::put('updateShipping', [SellerMasterController::class, 'updateShipping'])->name('updateShipping');
        Route::get('deleteShipping/{id}', [SellerMasterController::class, 'editShipping']);
        Route::put('deleteShipping', [SellerMasterController::class, 'destroyShipping'])->name('deleteShipping');
    });

    // Tax Master
    Route::group(['prefix' => 'tax-master', 'namespace' => 'TaxMasters', 'as' => 'taxMaster.'], function(){
        Route::get('list', [TaxMasterController::class, 'list'])->name('list');        
        Route::post('insert', [TaxMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [TaxMasterController::class, 'edit'])->name('edit');
        Route::put('update', [TaxMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TaxMasterController::class, 'edit']);
        Route::put('delete', [TaxMasterController::class, 'destroy'])->name('delete');
        Route::get('search', [TaxMasterController::class, 'search'])->name('search');
    });

});


/*______________________________________________________________________
                                                                       
        Admin Routes                                                     
______________________________________________________________________*/
/*
Route::group(['prefix' => 'admin-panel', 'namespace' => 'admin', 'middleware' => 'admin'], function (){
    // Route::get('company-details', [AllUsersController::class, 'companyDetails'])->name('admin.companyDetails');
});
*/
