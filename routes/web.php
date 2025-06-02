<?php

use Illuminate\Support\Facades\Route;

/**
 * Closure Routes
 */


Route::get('/hello-world', function () {
    return "Hello, World!";
});
Route::post('/submit', function () {
    return "Form submitted!";
});
Route::put('/update', function () {
    return "Resource updated!";
});
Route::delete('/delete', function () {
    return "Resource deleted!";
});
Route::get('/math/add/{a}/{b}', function ($a, $b) {
    return $a + $b;
});


/**
 * Controller Methods
 */

use App\Http\Controllers\WelcomeController;

Route::get('/welcome-controller', [WelcomeController::class, 'index']);


/**
 * Route Parameters
 */
Route::get('/user/{id}', function ($id) {
    return "User ID: " . $id;
});
Route::get('/product/{id?}', function ($id = "default") {
    return "Product ID: " . $id;
});
Route::get('/order/{id}', function ($id) {
    return "Order ID: " . $id;
})->where('id', '[0-9]+'); // Only accepts numeric IDs


/**
 * Named Routes
 */
Route::get('/named-route', function () {
    return redirect()->route('url.example');
})->name('named.route');
// url() helper -> generates a URL for the named route
Route::get('/url-example', function () {
    $url = url('/welcome-controller');
    return "URL to Welcome Controller: " . $url;
})->name('url.example');
//Passing Route Parameters as array to the route helper
Route::get('/user-profile', function () {
    $url = route('user.profile', ['id' => 1]);
    return "User Profile URL: " . $url;
})->name('user.profile');


/**
 * Route Groups
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', fn() => 'Admin Dashboard');
    Route::get('/users', fn() => 'Admin Users');
});


/*
 * Route Group Controller
 */
//Route::controller(WelcomeController::class)->group(function () {
//    Route::get('/welcome', 'index')->name('welcome.index');
//    Route::post('/welcome/submit', 'store')->name('welcome.store');
//});


/**
 * Signed Routes
 */

use Illuminate\Support\Facades\URL;

Route::get('/signed-url', function () {
    $url = URL::temporarySignedRoute('welcome.index', now()->addMinutes(30), ['id' => 1]);
    return "Signed URL: " . $url;
})->name('signed.url');


/**
 * Views
 */
Route::get('/', function () {
    return view('welcome')->with('title', 'Welcome to My Application');
});
//Route::view('/', 'welcome');


Route::get('/task-controller', [App\Http\Controllers\TaskController::class, 'index'])
    ->name('task.index');


/*
 * Fallback Route
 */
Route::fallback(function () {
//    return response()->json(['message' => 'Resource not found'], 404);
    return "Fehler 404: Seite nicht gefunden.";
});


