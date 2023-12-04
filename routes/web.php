<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\allUsers\AllUsersController;
use App\Http\Controllers\allUsers\companyDetails\CompanyDetailsController;
use App\Http\Controllers\allUsers\channelPartner\ChannelPartnerController;

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

    // Channel Partner
    Route::group(['prefix' => 'channel-partner', 'namespace' => 'channelPartner', 'as' => 'channelPartner.'], function(){
        Route::get('getall', [ChannelPartnerController::class, 'get_company_list'])->name('get_company_list');        
        Route::post('insert', [ChannelPartnerController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [ChannelPartnerController::class, 'edit'])->name('edit');
        Route::put('update', [ChannelPartnerController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ChannelPartnerController::class, 'edit']);
        Route::put('delete', [ChannelPartnerController::class, 'destroy'])->name('delete');
        Route::get('search', [ChannelPartnerController::class, 'search'])->name('search');
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
