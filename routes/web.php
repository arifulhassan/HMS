<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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
    return view('welcome');
});

Route::get('/home',[HomeController::class,'redirect']);

Route::get('/home',[HomeController::class,'redirect']);


// Settings
Route::get('panel/admin/settings','AdminController@settings');
Route::post('panel/admin/settings','AdminController@saveSettings');

Route::post('/admin/page/{pageSlug}/settings/update', [AdminController::class, 'updatePageSettings'])
    ->name('admin.page.settings.update');


// Limits
Route::get('panel/admin/settings/limits','AdminController@settingsLimits');
Route::post('panel/admin/settings/limits','AdminController@saveSettingsLimits');

// Pages
Route::resource('panel/admin/pages', 'PagesController',
['names' => [
    'edit'    => 'pages.edit',
    'destroy' => 'pages.destroy'
 ]]
);

// Profiles Social
Route::get('panel/admin/profiles-social','AdminController@profiles_social');
Route::post('panel/admin/profiles-social','AdminController@update_profiles_social');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


