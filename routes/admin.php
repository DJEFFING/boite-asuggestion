<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminAcceuil;
use App\Http\Controllers\admin\SuggestionAdmin;
use App\Http\Controllers\admin\ListUserController;
use App\Http\Controllers\admin\CategorieController;

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


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::name('admin.')->group(function () {
        //  Route::get('/',function(){ return view('view_admin.acceuil'); })->name('acceuill');ute

        Route::get('/', [AdminAcceuil::class, 'index'])->name('acceuill');



        Route::controller(CategorieController::class)->prefix('categories')->name('categorie.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::put('/edit/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });
        Route::prefix('user/')->name('user.')->group(function () {
            Route::controller(ListUserController::class)->prefix('userList/')->name('userList.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('userDetaill/{user}', 'userDetaill')->name('user_detaill');
                Route::get('Liste_user_admin', 'listUserAdmin')->name('listUserAdmin');
                Route::post('create_Admin/{user}', 'createAdmin')->name('createAdmin');
                Route::post('notify_user-{user}', 'notifyUser')->name('notify-user');
                Route::delete('delete-user-{user}', 'delete')->name('delete-user');
                Route::delete('delete-admin-{user}', 'deleteAdmin')->name('delete-user-admin');
            });

            Route::controller(SuggestionAdmin::class)->prefix('suggestion/')->name('suggestion.')->group(function () {
                Route::post('/add_validate_suggestion', 'storeApprouveSuggestion')->name('add_suggestion_approuvee');
                Route::get('/private_suggestion', 'privateSuggestion')->name('suggestions_privees');
                Route::get('/all_suggestion', 'allSuggestion')->name('toutes_suggestions');
                Route::get('/validate_suggestion', 'validateSuggestion')->name('suggestions_approuvees');
                Route::get('/seggestionDetail-{id_suggestion}', 'detail_suggestion')->name('sugesstion-detaill');
            });
        });
    });
});
