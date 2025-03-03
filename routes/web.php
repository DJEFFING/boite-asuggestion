<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\SuggestionController;
use App\Http\Controllers\web\auth\LoginController;
use App\Http\Controllers\web\AcceuilWebController;
use App\Http\Controllers\web\NotificationController;
use App\Http\Controllers\admin\SuggestionAdmin;
use App\Http\Controllers\web\UserWebController;

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


Route::get('/loginPage',[LoginController::class, 'loginPage'])->name('user.login-page');
// Route::post('/login',function(){ return "test";})->name('user.login');
Route::post('/login',[LoginController::class, 'login'])->name('user.login');
Route::get('/logout',[LoginController::class,'logout'])->name('user.logout');
Route::get('/register-page',function(){ return view('view_site.user.addtionnal_Page.register'); })->name('user.register-page');
Route::post('/register', [LoginController::class,'register'])->name('user.register');

Route::get('/', function () {
    if (!Auth()->check()) {
        return redirect('/loginPage');
    }
    return redirect('acceuil/');
})->name('login');


Route::middleware('auth')->group(function(){
    Route::controller(AcceuilWebController::class)->prefix('acceuil/')->name('acceuil')->group(function(){
        Route::get('/', 'acceuil')->name('web_acceuil');
    });



    Route::controller(SuggestionController::class)->prefix('suggestions/')->name('suggestions.')->group(function(){
        Route::get('/suggestions', 'index')->name('index');
        Route::get('/seggestionDetail-{suggestion}','detail_suggestion')->name('sugesstion-detaill');
        Route::post('/store','store')->name('store');
        Route::get('/suggestions/{suggestion}/like','unlike')->name('unlike');
        Route::get('/suggestions/add/{suggestion}/like','like')->name('like');
        Route::post('/commenter', 'comment')->name('comment');

    });

    Route::controller(UserWebController::class)->prefix('user/')->name('user.')->group(function(){
        Route::get('/profil', 'profil')->name('profil');
        Route::post('/profil/update/{user}', 'updateProfile')->name('profil.update');
        Route::get('/help',function(){ return view('view_site.user.help');})->name('help');
    });





    /* debut notification */
    Route::get('/notifications', [NotificationController::class,'index'])->name('notifications.index');
    /* fin notification */
});

