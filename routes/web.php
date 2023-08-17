<?php

use App\Http\Livewire\AdminPanel\BorrowingRequest\BorrowingRequestTable;
use App\Http\Livewire\AdminPanel\Inventory\InventoryTable;
use App\Http\Livewire\AdminPanel\ManageUser\AdminTable;
use App\Http\Livewire\AdminPanel\ManageUser\ClientTable;
use App\Http\Livewire\AdminPanel\RequestingServices\RequestingServicesTable;
use App\Http\Livewire\ClientPanel\EquipmentBorrowing\EquipmentBorrowingTable;
use App\Http\Livewire\ClientPanel\RequestService\RequestServiceTable;
use App\Http\Livewire\DashBoard\DashBoard;
use App\Http\Livewire\Profile\EditProfileForm;
use App\Http\Livewire\Profile\PasswordUpdate;
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
    // return view('welcome');   
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    Route::get('/dashboard', DashBoard::class)->name('dashboard');
    Route::get('/editprofileform', EditProfileForm::class)->name('editprofileform');
    Route::get('/passwordupdate', PasswordUpdate::class)->name('passwordupdate');
    
    //Admin Panel
    Route::get('/admin-table', AdminTable::class)->name('admin-table')->middleware('checkRulepermissionadmin');
    Route::get('/client-table', ClientTable::class)->name('client-table')->middleware('checkRulepermissionadmin');
    Route::get('/inventory-table', InventoryTable::class)->name('inventory-table')->middleware('checkRulepermissionadmin');
    Route::get('/borrowing-request-table', BorrowingRequestTable::class)->name('borrowing-request-table')->middleware('checkRulepermissionadmin');
    Route::get('/requesting-services-table', RequestingServicesTable::class)->name('requesting-services-table')->middleware('checkRulepermissionadmin');
    
    
    //Client Panel
    Route::get('/equipment-borrowing-table', EquipmentBorrowingTable::class)->name('equipment-borrowing-table')->middleware('checkRulepermissionclient');
    Route::get('/request-service-table', RequestServiceTable::class)->name('request-service-table')->middleware('checkRulepermissionclient');
});
