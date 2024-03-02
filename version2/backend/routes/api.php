<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
////////////////////////start posts////////////////////

Route::get('posts', [ApiController::class, 'posts']);
Route::get('LastPosts', [ApiController::class, 'LastPosts']);
Route::get('PopularPosts', [ApiController::class, 'PopularPosts']);
Route::get('SinglePost/{PostName}', [ApiController::class, 'SinglePost']);
////////////////////////End posts////////////////////


////////////////////////start videos////////////////////
Route::get('PopularVideos', [ApiController::class, 'PopularVideos']);
////////////////////////End videos////////////////////


////////////////////////start tags////////////////////
Route::get('tags', [ApiController::class, 'tags']);
Route::get('Tabstags', [ApiController::class, 'Tabstags']);
Route::get('testtag', [ApiController::class, 'testtag']);
Route::get('SingleTag/{TagName}', [ApiController::class, 'SingleTag']);
Route::get('childtags/{id}', [ApiController::class, 'childtags']);
Route::get('maintags', [ApiController::class, 'maintags']);
////////////////////////End tags////////////////////
////////////////////////start tags////////////////////
Route::get('groups', [ApiController::class, 'groups']);
Route::get('SingleGroup/{GroupName}', [ApiController::class, 'SingleGroup']);
Route::get('subtag/{subtagName}', [ApiController::class, 'SingleSubTag']);
////////////////////////End tags////////////////////
