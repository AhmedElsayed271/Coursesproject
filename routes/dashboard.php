<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\CoursesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\dashboard\RequestWithdrawalWalletController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\VideoController;

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

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('courses', CoursesController::class)->except(['show']);

    Route::get('sections/{course_id}', [SectionController::class, 'index'])->name('sections.index');
    Route::get('sections/create/{course_id}', [SectionController::class, 'create'])->name('sections.create');
    Route::post('sections/store', [SectionController::class, 'store'])->name('sections.store');
    Route::get('sections/edit/{section_id}', [SectionController::class, 'edit'])->name('sections.edit');
    Route::put('sections/update/{update}', [SectionController::class, 'update'])->name('sections.update');
    Route::delete('sections/destroy/{update}', [SectionController::class, 'destroy'])->name('sections.destroy');

    Route::get('videos/create/{section_id}', [VideoController::class, 'create'])->name('videos.create');

    Route::get('videos/{section_id}', [VideoController::class, 'index'])->name('videos.index');
    Route::post('videos/store', [VideoController::class, 'store'])->name('videos.store');

    Route::post('videos/store', [VideoController::class, 'store'])->name('videos.store');
    Route::get('videos/edit-details/{video_id}', [VideoController::class, 'editDetails'])->name('videos.edit.details');
    Route::post('videos/update-details/{video_id}', [VideoController::class, 'updateDetails'])->name('videos.update.details');
    Route::get('videos/edit/{video_id}', [VideoController::class, 'edit'])->name('videos.edit');
    Route::post('videos/update/{video_id}', [VideoController::class, 'update'])->name('videos.update');
    Route::delete('videos/destory/{video_id}', [VideoController::class, 'destroy'])->name('videos.destroy');
    Route::get('orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('request-withdrawal', [RequestwalletController::class, 'index'])->name('request.withdrawal.index');
    Route::post('request-withdrawal/transfer/{id}', [RequestwalletController::class, 'transfer'])->name('request.withdrawal.transfer');
    Route::get('request-withdrawal/transfered', [RequestWithdrawalWalletController::class, 'transfered'])->name('request.withdrawal.transfered');
    Route::get('contact-us/index', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('contact-us/delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');
});
Route::group(['middleware' => 'auth:web'], function () {

    Route::post('request-withdrawal/create', [RequestwalletController::class, 'create'])->name('request.withdrawal.create');

    Route::post('contact-us/create', [ContactController::class, 'create'])->name('contact.create');;
});





Route::group(['middleware' => 'guest:admin'], function () {
});
