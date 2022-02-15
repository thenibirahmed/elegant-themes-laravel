<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get( '/', function () {

    return view( 'welcome' );
} );

Route::get( '/dashboard', function () {
    $users = auth()->user()->role == "admin" ? User::paginate( 10 ) : [];

    return view( 'dashboard', [
        "users" => $users,
    ] );

} )->middleware( ['auth'] )->name( 'dashboard' );


Route::get( 'user/{user}', [ UserController::class, "show" ] )
    ->middleware( ['auth','isAdmin'] )
    ->name( 'user' );


require __DIR__ . '/auth.php';
