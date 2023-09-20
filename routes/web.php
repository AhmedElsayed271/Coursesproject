<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\PagesController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\MarketingController;
use App\Http\Controllers\website\ProfileUserController;
use App\Http\Controllers\website\VideoCourseController;
use App\Http\Controllers\payment\PaymentPaymobController;
use App\Http\Controllers\website\CourseDetailsController;

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



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/course-details/{course_id}', [CourseDetailsController::class, 'courseDetails'])->name('course.details');
Route::get('/checkout/{course_id}', [CheckoutController::class, 'checkout'])->name('checkout');


Route::get('/state', [PaymentPaymobController::class, 'state'])->name('state');

Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');





Route::middleware(['auth:web','auth.session'])->group(function () {

  Route::get('/paymob-pay', [PaymentPaymobController::class, 'PayByPaymob'])->name('PayByPaymob');
  Route::get('/profile/index', [ProfileUserController::class, 'showProfile'])->name('profile.index');
  Route::get('/video-course/{course_id}', [VideoCourseController::class, 'videoCourse'])->middleware('CheckUserBuyCourse')->name('video.course');
  Route::get('/marketing', [MarketingController::class, 'index'])->name('marketing');
});

Route::group(['middlware' => "auth:guest"], function () {

});



Route::middleware(['auth:web','auth.session'])->group(function () {
  
  // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/test', function () {

  // Cookie::queue('marketingBy', 1, 60 * 24 * 30);

  $marketingBy = Cookie::get('marketingBy');
  return $marketingBy;
  Auth::login(User::find(1));


  return Auth::guard('web')->user();
});

require __DIR__ . '/auth.php';
