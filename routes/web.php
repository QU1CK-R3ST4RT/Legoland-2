<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);

Route::get('/orders/', [OrderController::class, 'index'])->middleware('logged-in');
Route::get('/orders/create', [OrderController::class, 'create'])->middleware('administrator');
Route::get('/orders/{order}', [OrderController::class, 'get'])->middleware('administrator');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->middleware('administrator');
Route::get('/orders/{order}/delete', [OrderController::class, 'delete'])->middleware('administrator');
Route::post('/orders/{order}/edit', [OrderController::class, 'update'])->middleware('administrator');

Route::get('/tickets/', [TicketController::class, 'index'])->middleware('logged-in');
Route::get('/tickets/create', [TicketController::class, 'create'])->middleware('administrator');
Route::get('/tickets/{order}', [TicketController::class, 'get'])->middleware('administrator');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->middleware('administrator');
Route::get('/tickets/{ticket}/delete', [TicketController::class, 'delete'])->middleware('administrator');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'update'])->middleware('administrator');

Route::get('/nieuwsbrief', [MailController::class, 'toggle'])->middleware('logged-in');
Route::get('/nieuwsbrief/create', [MailController::class, 'index'])->middleware('administrator');
Route::post('/nieuwsbrief/create', [MailController::class, 'send'])->middleware('administrator');

//Route::get('/bestellen', [OrderController::class, 'createOrder'])->middleware('logged-in');
Route::get('/contact', [ContactController::class, 'index'])->middleware('logged-in');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('logged-in');
Route::get('/admin', [AdminController::class, 'index'])->middleware('administrator');

Route::post('/contact', [ContactController::class, 'store'])->middleware('logged-in');
Route::post('/registreer', [AuthController::class, 'register'])->middleware('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/bestellen', [OrderController::class, 'store'])->middleware('logged-in');

Route::get('/accommondations/', [AccommodationController::class, 'index'])->middleware('logged-in');
Route::get('/accommondations-admin/', [AccommodationController::class, 'Admin_index'])->middleware('administrator');
Route::post('/accommondations-admin/', [AccommodationController::class, 'createAccommodation'])->middleware('administrator');
Route::get('/accommondations/create', [AccommodationController::class, 'create'])->middleware('administrator');
Route::get('/accommondations/{accommondation}', [AccommodationController::class, 'get'])->middleware('administrator');
Route::get('/accommondations/{accommondation}/edit', [AccommodationController::class, 'edit'])->middleware('administrator');
Route::get('/accommondations/{accommondation}/delete', [AccommodationController::class, 'delete'])->middleware('administrator');
Route::post('/accommondations/{accommondation}/edit', [AccommodationController::class, 'update'])->middleware('administrator');

Route::get('/attractions-admin/', [AttractionController::class, 'Admin_index'])->middleware('administrator');
Route::post('/attractions-admin/', [AttractionController::class, 'createAttraction'])->middleware('administrator');
Route::get("/attractions/{attraction}/edit", [AttractionController::class, 'edit'])->middleware('administrator');
Route::get("/attractions/{attraction}", [AttractionController::class, 'get']);
Route::get("/attractions/{attraction}/delete", [AttractionController::class, 'delete'])->middleware('administrator');
Route::post("/attractions/{attraction}/edit", [AttractionController::class, 'update'])->middleware('administrator');

Route::post("/contact/{contact}/reply", [MailController::class, 'index'])->middleware('administrator');

Route::get('/{page}', [PageController::class, 'index']);
