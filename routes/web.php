<?php

use App\Http\Controllers\paypalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\propertiesController;
use App\Http\Controllers\ReservationController;

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
    $user = Auth::user();

    if ($user->hasRole('admin')) {
        return redirect('/dashboard');
    } elseif ($user->hasRole('client')) {
        return redirect('/Home');
    } elseif ($user->hasRole('proprietaire')) {
        return redirect('/properties');
    }
// dd($user->hasRole('admin'));
dd($user->hasRole('client'));
dd($user->hasRole('proprietaire'));
    return redirect('/Home');
})->middleware(['auth']);


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/inscrer', function () {
    return view('auth.register');
})->name('inscrer');

Route::POST('/Reservation/{id}',  [propertiesController::class, 'readPropretisDit'])->name('reservation_show')->middleware(['auth', 'role:client']);

Route::POST('/Reservation/store/{id}',  [ReservationController::class, 'create'])->name('reservation');
Route::get('/meReservation',  [ReservationController::class, 'index'])->name('meReservation');
Route::DELETE('/reservation/cancel/{id}',  [ReservationController::class, 'destroy'])->name('reservation.cancel');
Route::POST('/Payment',  [paypalController::class, 'pay'])->name('Pay');
Route::get('/success',  [paypalController::class, 'success'])->name('success');
Route::get('/error',  [paypalController::class, 'error'])->name('error');


Route::get('/dashboard', [AdminController::class, 'read'])->name('user.read')->middleware(['auth', 'role:admin']);
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware(['auth', 'role:admin']);
Route::post('/properties', [propertiesController::class, 'create'])->name('properties.create')->middleware(['auth', 'role:proprietaire']);
Route::get( '/properties', [propertiesController::class, 'readPropretis'])->name('properties.read')->middleware(['auth', 'role:proprietaire']);
Route::get( '/propertiese', [AdminController::class, 'readPropretis'])->name('properties.readAdmin')->middleware(['auth', 'role:admin']);
Route::post( '/modifer/{id}', [propertiesController::class, 'propertiesById'])->name('propertie.modifer')->middleware(['auth', 'role:proprietaire']);
Route::delete( '/destroy/{id}', [propertiesController::class, 'destroy'])->name('propertie.destroy')->middleware(['auth', 'role:proprietaire']);
Route::delete( '/destroye/{id}', [AdminController::class, 'destroyProperties'])->name('propertie.destroyProperties')->middleware(['auth', 'role:admin']);

Route::patch('/update/{id}', [propertiesController::class, 'update'])->name('update.properties')->middleware(['auth', 'role:proprietaire']);
Route::get('/Home', [propertiesController::class, 'readAllProperties'])->name('readAll.properties')->middleware(['auth', 'role:client']);
Route::POST('/favore/{id}', [propertiesController::class, 'favoriteCreate'])->name('favore.create')->middleware(['auth', 'role:client']);
Route::delete('/favorites/{id}', [propertiesController::class, 'removeFavorite'])->name('favore.remove')->middleware(['auth', 'role:client']);
Route::get('/favoris', [propertiesController::class, 'showFavoris'])->name('favoris.index')->middleware(['auth', 'role:client']);
Route::get('/search', [propertiesController::class, 'dynamicSearch'])->name('properties.dynamicSearch')->middleware(['auth', 'role:client']);


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware(['auth', 'role:admin']);
    Route::delete('/user/{id}', [AdminController::class, 'destroy'])->name('user.destroy')->middleware(['auth', 'role:admin']);
    Route::put('/status/{id}', [AdminController::class, 'changeStatus'])->name('user.changeStatus')->middleware(['auth', 'role:admin']);
    Route::get('/profile', [AdminController::class, 'readById'])->name('user.Profile')->middleware(['auth']);
    Route::put( '/user/{id}', [UserController::class, 'update'])->name('user.changeProfile')->middleware(['auth', 'role:admin']);



require __DIR__.'/auth.php';
