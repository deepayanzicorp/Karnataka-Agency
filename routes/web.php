<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\allUsers\AllUsersController;
use App\Http\Controllers\allUsers\companyDetails\CompanyDetailsController;
use App\Http\Controllers\allUsers\BuyerMasters\BuyerMasterController;
use App\Http\Controllers\allUsers\SellerMasters\SellerMasterController;
use App\Http\Controllers\allUsers\ProductCategoryMasters\ProductCategoryMasterController;
use App\Http\Controllers\allUsers\ThicknessMasters\ThicknessMasterController;
use App\Http\Controllers\allUsers\WidthMasters\WidthMasterController;
use App\Http\Controllers\allUsers\GradeMasters\GradeMasterController;
use App\Http\Controllers\allUsers\LengthMasters\LengthMasterController;
use App\Http\Controllers\allUsers\ItemMasters\ItemMasterController;
use App\Http\Controllers\allUsers\TaxMasters\TaxMasterController;
use App\Http\Controllers\allUsers\PlantMasters\PlantMasterController;


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
    Route::get('seller', [AllUsersController::class, 'sellerMaster'])->name('allUsers.sellerMaster');
    Route::get('buyer', [AllUsersController::class, 'buyerMaster'])->name('allUsers.buyerMaster');
    Route::get('product-category', [AllUsersController::class, 'productCategoryMaster'])->name('allUsers.productCategoryMaster');
    Route::get('thickness', [AllUsersController::class, 'thicknessMaster'])->name('allUsers.thicknessMaster');
    Route::get('width', [AllUsersController::class, 'widthMaster'])->name('allUsers.widthMaster');
    Route::get('grade', [AllUsersController::class, 'gradeMaster'])->name('allUsers.gradeMaster');
    Route::get('length', [AllUsersController::class, 'lengthMaster'])->name('allUsers.lengthMaster');
    Route::get('item', [AllUsersController::class, 'itemMaster'])->name('allUsers.itemMaster');
    Route::get('tax', [AllUsersController::class, 'taxMaster'])->name('allUsers.taxMaster');
    Route::get('plant', [AllUsersController::class, 'plantMaster'])->name('allUsers.plantMaster');
    Route::get('distance', [AllUsersController::class, 'distanceMaster'])->name('allUsers.distanceMaster');
    Route::get('item-price-list', [AllUsersController::class, 'itemPriceListMaster'])->name('allUsers.itemPriceListMaster');
    Route::get('freight-price-list', [AllUsersController::class, 'freightPriceListMaster'])->name('allUsers.freightPriceListMaster');

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
    Route::group(['prefix' => 'buyer', 'namespace' => 'BuyerMasters', 'as' => 'buyerMaster.'], function(){
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
    Route::group(['prefix' => 'seller', 'namespace' => 'SellerMasters', 'as' => 'sellerMaster.'], function(){
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

    // Product-Category Master
    Route::group(['prefix' => 'product-category', 'namespace' => 'ProductCategoryMasters', 'as' => 'productcategoryMaster.'], function(){
        Route::get('list', [ProductCategoryMasterController::class, 'list'])->name('list');        
        Route::post('insert', [ProductCategoryMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [ProductCategoryMasterController::class, 'edit'])->name('edit');
        Route::put('update', [ProductCategoryMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ProductCategoryMasterController::class, 'edit']);
        Route::put('delete', [ProductCategoryMasterController::class, 'destroy'])->name('delete');
    });

    // Thickness Master
    Route::group(['prefix' => 'thickness', 'namespace' => 'ThicknessMasters', 'as' => 'thicknessMaster.'], function(){
        Route::get('list', [ThicknessMasterController::class, 'list'])->name('list');        
        Route::post('insert', [ThicknessMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [ThicknessMasterController::class, 'edit'])->name('edit');
        Route::put('update', [ThicknessMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ThicknessMasterController::class, 'edit']);
        Route::put('delete', [ThicknessMasterController::class, 'destroy'])->name('delete');
    });

    // Width Master
    Route::group(['prefix' => 'width', 'namespace' => 'WidthMasters', 'as' => 'widthMaster.'], function(){
        Route::get('list', [WidthMasterController::class, 'list'])->name('list');        
        Route::post('insert', [WidthMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [WidthMasterController::class, 'edit'])->name('edit');
        Route::put('update', [WidthMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [WidthMasterController::class, 'edit']);
        Route::put('delete', [WidthMasterController::class, 'destroy'])->name('delete');
    });

    // Grade Master
    Route::group(['prefix' => 'grade', 'namespace' => 'GradeMasters', 'as' => 'gradeMaster.'], function(){
        Route::get('list', [GradeMasterController::class, 'list'])->name('list');        
        Route::post('insert', [GradeMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [GradeMasterController::class, 'edit'])->name('edit');
        Route::put('update', [GradeMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [GradeMasterController::class, 'edit']);
        Route::put('delete', [GradeMasterController::class, 'destroy'])->name('delete');
    });

    // Length Master
    Route::group(['prefix' => 'length', 'namespace' => 'LengthMasters', 'as' => 'lengthMaster.'], function(){
        Route::get('list', [LengthMasterController::class, 'list'])->name('list');        
        Route::post('insert', [LengthMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [LengthMasterController::class, 'edit'])->name('edit');
        Route::put('update', [LengthMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [LengthMasterController::class, 'edit']);
        Route::put('delete', [LengthMasterController::class, 'destroy'])->name('delete');
    });

    // Item Master
    Route::group(['prefix' => 'item', 'namespace' => 'ItemMasters', 'as' => 'itemMaster.'], function(){
        Route::get('list', [ItemMasterController::class, 'list'])->name('list');        
        Route::post('insert', [ItemMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [ItemMasterController::class, 'edit'])->name('edit');
        Route::put('update', [ItemMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ItemMasterController::class, 'edit']);
        Route::put('delete', [ItemMasterController::class, 'destroy'])->name('delete');
    });

    // Tax Master
    Route::group(['prefix' => 'tax', 'namespace' => 'TaxMasters', 'as' => 'taxMaster.'], function(){
        Route::get('list', [TaxMasterController::class, 'list'])->name('list');        
        Route::post('insert', [TaxMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [TaxMasterController::class, 'edit'])->name('edit');
        Route::put('update', [TaxMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TaxMasterController::class, 'edit']);
        Route::put('delete', [TaxMasterController::class, 'destroy'])->name('delete');
        Route::get('search', [TaxMasterController::class, 'search'])->name('search');
    });

    // Plant Master
    Route::group(['prefix' => 'plant', 'namespace' => 'PlantMasters', 'as' => 'plantMaster.'], function(){
        Route::get('list', [PlantMasterController::class, 'list'])->name('list');        
        Route::post('insert', [PlantMasterController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [PlantMasterController::class, 'edit'])->name('edit');
        Route::put('update', [PlantMasterController::class, 'update'])->name('update');
        Route::get('delete/{id}', [PlantMasterController::class, 'edit']);
        Route::put('delete', [PlantMasterController::class, 'destroy'])->name('delete');
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
