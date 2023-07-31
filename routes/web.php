<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create')->middleware('role:admin');
    Route::get('/customers/search/{seachKey}', [CustomerController::class, 'search'])->name('customers.search');
    Route::get('/customers/toggle/{customer}', [CustomerController::class, 'toggleActive'])->name('customers.toggle');
    Route::get('/customers/sendmail', [CustomerController::class, 'sendMail']);
    Route::post('/customers/sendmail/send', [CustomerController::class, 'sendToAllCustomers']);
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit')->middleware('role:admin');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update')->middleware('role:admin');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy')->middleware('role:admin');
    
    Route::get('/customers/{customer}/create-order', [CustomerController::class, 'createOrder'])->name('customers.createOrder');
    Route::post('/customers/{customer}/store-order', [CustomerController::class, 'storeOrder'])->name('customers.storeOrder');
    Route::get('/customers/{customer}/orders/{order}/edit', [CustomerController::class, 'editOrder'])->name('orders.edit');
    Route::put('/customers/{customer}/orders/{order}', [CustomerController::class, 'updateOrder'])->name('orders.update');
    // Route::put('/customers/{customer}/orders/{order}', 'CustomerController@updateOrder')->name('orders.update');

    
});

require __DIR__.'/auth.php';