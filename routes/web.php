<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CicController;
use App\Http\Controllers\csvController;
use App\Http\Controllers\usermgmtController;
use App\Http\Controllers\currencyController;
use App\Http\Controllers\NumberGenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/check/printcert', [CicController::class, 'printcert']);

Route::get('/printerror', function () {
   return view('printerror');
});
/** 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
**/
Route::get('/newcert',function(){
    return view('certificate.newcert');
})->middleware(['auth','verified']);

Route::middleware('auth')->group(function () {
    Route::get('/newcert/create', [CicController::class, 'createStep1'])->name('cic.createStep1');
    Route::post('/newcert/createstep1', [CicController::class, 'postcreateStep1'])->name('cic.postcreateStep1');
    Route::post('/newcert/createstep2', [CicController::class, 'postcreateStep2'])->name('cic.postcreateStep2');
    Route::post('/newcert/createstep3', [CicController::class, 'postcreateStep3'])->name('cic.postcreateStep3');
    Route::get('/newcert/dashboard', [CicController::class, 'index']);
    Route::get('/newcert/printcert', [CicController::class, 'printcert']);
    Route::get('/newcert/approval_list',[CicController::class, 'toApprove']);
    Route::get('/newcert/validate',[CicController::class, 'toValidate']);
    Route::post('/newcert/edit',[CicController::class, 'editcert']);
    Route::GET('/newcert/edit',[CicController::class, 'editcert']);
    Route::get('/newcert/approved',[CicController::class, 'showApprove']);
    Route::get('/newcert/qapprove',[CicController::class, 'qapprove']);
    Route::get('/newcert/qreject',[CicController::class, 'qreject']);
    Route::get('/newcert/getcert',[CicController::class, 'getcert']);
    Route::get('/newcert/getcciwa',[CicController::class, 'getcciwa']);
    Route::get('/dashboard', [CicController::class, 'homeDashboard'])->name('dashboard');  
    Route::post('/dashboard', [CicController::class, 'homeDashboard'])->name('dashboard');  
    Route::get('/get_csv', [CsvController::class, 'get_csv'])->name('get_csv');
    Route::get('/newcert/genreport',function(){
        return view('certificate.gen_reports');
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/usermgmt', [usermgmtController::class,'index']);
    Route::get('/usermgmt/getuser', [usermgmtController::class,'show']);
    Route::post('/usermgmt/edit_user', [usermgmtController::class,'edit']);
    Route::post('/usermgmt/edit_user_profile', [usermgmtController::class,'editprofile']);
    Route::post('/usermgmt/del_user', [usermgmtController::class,'destroy']);
});

Route::middleware('auth')->group(function(){
    Route::get('/usermgmt/currency',[currencyController::class, 'index']);
    Route::post('/usermgmt/addcurrency',[currencyController::class, 'store']);
    Route::post('/usermgmt/editcurrency',[currencyController::class, 'edit']);   

});

Route::middleware('auth')->group(function(){
    Route::get('/usermgmt/numbering',[NumberGenController::class, 'index']);
    Route::post('/usermgmt/addnumbers',[NumberGenController::class, 'store']);
    Route::post('/usermgmt/editnumbering',[NumberGenController::class, 'edit']);   

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

+
require __DIR__.'/auth.php';
