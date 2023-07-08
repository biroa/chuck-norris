<?php

use App\Http\Controllers\MailingListController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MailingListController::class, 'index'])->name('main.page');
Route::post('/', [MailingListController::class, 'store'])->name('post.new.email');
