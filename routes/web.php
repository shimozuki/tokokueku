<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\OrderController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('cakes');

Route::get('/products/{slug}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/order', function () {
    return view('frontend.order');
})->name('order');

Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->name('register.store');
});

Route::middleware('auth:moonshine')->group(function () {

    Route::post(
        '/order/store',
        [OrderController::class, 'store']
    )->name('order.store');

    Route::get(
        '/my-orders',
        [OrderController::class, 'myOrders']
    )->name('my.orders');

    Route::get(
        '/my-orders/{id}',
        [OrderController::class, 'show']
    )->name('orders.show');

    Route::post(

        '/notification/read/{id}',

        function ($id) {

            $notification = auth()
                ->user()
                ->notifications()
                ->find($id);

            if ($notification) {

                $notification->markAsRead();
            }

            return back();
        }

    )->name('notification.read');

    Route::get(
        '/orders/{id}/invoice',
        [OrderController::class, 'invoice']
    )->name('orders.invoice');
});

Route::get('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get(

    '/export-sales',

    [ExportController::class, 'sales']

)->name('export.sales');

require __DIR__ . '/auth.php';
