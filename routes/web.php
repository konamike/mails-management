<?php

use App\Http\Controllers\FileOutDataController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
    return view('/admin');
});

//Routes for Mailing
// Route::get('/email', function () {
//     Mail::to("konamike22@gmail.com")->send(new WelcomeMail());
//     return new WelcomeMail();
// }
// );

// Route::get('/send-fileout', [FileOutDataController::class, 'sendNotification'] );
