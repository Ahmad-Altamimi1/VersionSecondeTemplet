<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Videos;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContentMangement;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;

use App\Http\Controllers\GroupsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideosController;

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
// Route::patch('/contenmangment', [ContentMangement::class, 'update'])->name('contenmangment.update');;
Route::get('contenmangment', [ContentMangement::class, 'index']);
Route::patch('contenmangment/store/{id}', [ContentMangement::class, 'update'])->name('contenmangment.update');
Route::patch('managcontentdelete', [ContentMangement::class, 'destroy'])->name('contenmangment.destroy');

Route::get('/fetch-content', [HomeController::class, 'fetchContent']);
Route::get('/fetch-video', [HomeController::class, 'fetchvideo']);
Route::get('/error', [HomeController::class, 'error'])->name('error.404');



Auth::routes();
Route::get('/', [App\Http\Controllers\webcontrol::class, 'login']);
Route::get('/home', [App\Http\Controllers\webcontrol::class, 'login'])->name('home');



Route::resource('posts', PostController::class);
Route::resource('tags', TagController::class);
Route::resource('groups', GroupsController::class);
Route::resource('videos', VideosController::class);


/// dashboards
Route::get('/dashboard', [App\Http\Controllers\webcontrol::class, 'index'])->name('dashboard');
Route::get('/color', [App\Http\Controllers\postcontrol::class, 'color'])->name('color');

Route::get('/profile/{user}/edit', [App\Http\Controllers\webcontrol::class, 'edit'])->name('profile.edit');

Route::get('/programs', [App\Http\Controllers\postcontrol::class, 'programs'])->name('programs');
Route::get('/programs/create', [App\Http\Controllers\postcontrol::class, 'createprograms'])->name('createprograms');
Route::get('/programs/{id}/edit', [App\Http\Controllers\postcontrol::class, 'programsvideos'])->name('programsvideos.edit');
Route::get('/programsvid/{id}/create', [App\Http\Controllers\postcontrol::class, 'createprogramsvid'])->name('createprogramsvid');
Route::get('/programsvid/{id}/edit', [App\Http\Controllers\postcontrol::class, 'editprogramsvid'])->name('editprogramsvid');
Route::get('/programseditprogram/{id}', [App\Http\Controllers\postcontrol::class, 'editprogramdata'])->name('editprogramdata.edit');



Route::get('/posts/pictures', [App\Http\Controllers\postcontrol::class, 'pictures'])->name('pictures');
Route::get('/posts/addpictures', [App\Http\Controllers\postcontrol::class, 'addpicture'])->name('addpicture');
Route::get('/posts/pictures/{id}/edit', [App\Http\Controllers\postcontrol::class, 'picturesedit'])->name('pictures.edit');

///forms

Route::post('/storeprograms', [App\Http\Controllers\postcontrol::class, 'storeprograms'])->name('storeprograms');
Route::patch('/programs/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroyprogram'])->name('program.destroy');
Route::post('/storeprogramsvid', [App\Http\Controllers\postcontrol::class, 'storeprogramsvid'])->name('storeprogramsvid');
Route::patch('/programsvid/{id}', [App\Http\Controllers\postcontrol::class, 'editprogramsvideo'])->name('programsvideo.update');
Route::patch('/programsvid/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroyprogramsvid'])->name('programsvid.destroy');
Route::patch('/program/{id}', [App\Http\Controllers\postcontrol::class, 'editprograms'])->name('program.update');


Route::post('/store_pictures', [App\Http\Controllers\postcontrol::class, 'store_pictures'])->name('store_pictures');
Route::patch('/pictures/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroypictures'])->name('destroypictures');
Route::patch('/pictures/{id}', [App\Http\Controllers\postcontrol::class, 'editpicture'])->name('picture.update');


/// main website
// Route::get('/posts/{id}/show', [App\Http\Controllers\webcontrol::class, 'postbyid'])->name('postbyid');
Route::get('/group/{id}/show', [App\Http\Controllers\webcontrol::class, 'groupbyid'])->name('groupbyid');
Route::get('/grouptags/{id}/show', [App\Http\Controllers\webcontrol::class, 'groupsecbyid'])->name('groupsecbyid');
Route::get('/tags/{id}/show', [App\Http\Controllers\webcontrol::class, 'tagbyid'])->name('tagbyid');
Route::get('/videotags/{id}/show', [App\Http\Controllers\webcontrol::class, 'videotags'])->name('videotags');
Route::get('/tags/{tag}', [App\Http\Controllers\webcontrol::class, 'tagbyid'])->name('showtag');
Route::get('/tags/{id}/show/{nm}', [App\Http\Controllers\webcontrol::class, 'tagbyidnum'])->name('tagbyidnum');
Route::get('/videos/{id}/show', [App\Http\Controllers\webcontrol::class, 'videobyid'])->name('videobyid');
Route::get('/tagsvid/{id}/show', [App\Http\Controllers\webcontrol::class, 'tagbyidvid'])->name('tagbyidvid');
Route::get('/videos/show', [App\Http\Controllers\webcontrol::class, 'videosshow'])->name('videosshow');
// Route::get('/videos/{id}/show', [App\Http\Controllers\webcontrol::class, 'videosshownum'])->name('videosshownum');
Route::get('/login', [App\Http\Controllers\webcontrol::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\webcontrol::class, 'register'])->name('register');
Route::get('/aboutus', [App\Http\Controllers\webcontrol::class, 'aboutgus'])->name('aboutus');
Route::get('/contactus', [App\Http\Controllers\webcontrol::class, 'contactus'])->name('contactus');
Route::get('/policy', [App\Http\Controllers\webcontrol::class, 'policy'])->name('policy');
Route::get('/Intellectual_property_rights', [App\Http\Controllers\webcontrol::class, 'Intellectual_property_rights'])->name('Intellectual_property_rights');
Route::get('/privacy', [App\Http\Controllers\webcontrol::class, 'privacy'])->name('privacy');




// 26/2/2023
// add user control
Route::get('/userscontrol', [App\Http\Controllers\webcontrol::class, 'userscontrol'])->name('userscontrol');
Route::get('/showdayaction', [App\Http\Controllers\webcontrol::class, 'showdayaction'])->name('showdayaction');
Route::post('/showdaysaction', [App\Http\Controllers\webcontrol::class, 'showdaysaction'])->name('showdaysaction');
Route::patch('/tags/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroytags'])->name('destroytags');


// 27/2/2023
// allow user to change password
Route::post('/updatePassword', [App\Http\Controllers\postcontrol::class, 'updatePassword'])->name('updatePassword');
Route::get('sitemap.xml', [App\Http\Controllers\webcontrol::class,  'sitemap'])->name('sitemap');
Route::get('/search-posts', [App\Http\Controllers\postcontrol::class, 'search'])->name('search-posts');
Route::get('/search-pictures', [App\Http\Controllers\postcontrol::class, 'search-pictures'])->name('search-pictures');
