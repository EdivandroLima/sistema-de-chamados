<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Tickets\Show as TicketShow;
use App\Livewire\Tickets\Create as TicketCreate;
use App\Livewire\Customers\All as CustomersAll;
use App\Livewire\Dashboard;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    // Tickets
    Route::get('/create', TicketCreate::class)->name('tickets.create');
    Route::get('/show/{ticket}', TicketShow::class)->name('tickets.show');
    // Clientes
    Route::get('/customers', CustomersAll::class)->name('customers.index');
});
