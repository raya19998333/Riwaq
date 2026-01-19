<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
Route::get('/', function () {
    return view('Home/home');
});
Route::get('/events', function () {
    return view('Events/events');
});
Route::get('/exhibitions', function () {
    return view('Exhibitions/exhibitions');
});
Route::get('/content', function () {
    return view('Content/content');
});
Route::get('/about', function () {
    return view('About/about');
});
Route::get('/contact', function () {
    return view('Contact/contact');
});
// web.php
Route::get('/login', function () {
    return view('Auth/login');
});
Route::get('/hall-booking',function(){
    return view('Booking/hall-booking');
});
Route::get('/register', function () {
    return view('Auth/register');
}); 
Route::post('/hall-booking', [BookingController::class, 'store'])
    ->name('booking.store');