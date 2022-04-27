<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CategoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login',[LoginController::class,'login'])->name('login');

// reset pass

Route::post('/forget/password/email',[LoginController::class,'passwordReset']);
Route::post('/post/new/password/{token}',[LoginController::class,'newPassword'])->name('new.password');


Route::group(['middleware'=>['auth:api']],function(){

    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/users',[UserController::class,'userList'])->name('user.list');

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category/list','categoryList')->name('category.list');
        Route::post('/catagory/add','categoryAdd')->name('category.add');
        Route::put('/category/update/{category_id}','categoryUpdate')->name('category.update');
        Route::get('/category/delete/{category_id}','categoryDelete')->name('category.delete');
    });

});

