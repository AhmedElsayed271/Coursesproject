<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\MarketingController;
use App\Http\Controllers\website\ProfileUserController;
use App\Http\Controllers\website\VideoCourseController;
use App\Http\Controllers\payment\PaymentPaymobController;
use App\Http\Controllers\website\CourseDetailsController;
use App\Http\Controllers\website\PagesController;
use Illuminate\Support\Facades\Cookie;

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





Route::middleware('auth:web')->group(function () {

  Route::get('/paymob-pay', [PaymentPaymobController::class, 'PayByPaymob'])->name('PayByPaymob');
  Route::get('/profile/index', [ProfileUserController::class, 'showProfile'])->name('profile.index');
  Route::get('/video-course/{course_id}', [VideoCourseController::class, 'videoCourse'])->middleware('CheckUserBuyCourse')->name('video.course');
  Route::get('/marketing', [MarketingController::class, 'index'])->name('marketing');
});

Route::group(['middlware' => "auth:guest"], function () {

});



Route::middleware('auth:web')->group(function () {
  
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

  $response = '{
        "obj": {
          "id": 2556706,
          "pending": false,
          "amount_cents": 100,
          "success": true,
          "is_auth": false,
          "is_capture": false,
          "is_standalois_capturene_payment": true,
          "is_voided": false,
          "is_refunded": false,
          "is_3d_secure": true,
          "integration_id": 6741,
          "profile_id": 4214,
          "has_parent_transaction": false,
          "order": {
            "id": 4778239,
            "created_at": "2020-03-25T18:36:05.494685",
            "delivery_needed": true,
            "merchant": {
              "id": 4214,
              "created_at": "2019-09-22T18:32:56.764441",
              "phones": [
                "01032347111"
              ],
              "company_emails": [
                "fnjum@temp-link.net"
              ],
              "company_name": "Accept Payments",
              "state": "",
              "country": "EGY",
              "city": "",
              "postal_code": "",
              "street": ""
            },
            "collector": {
              "id": 115,
              "created_at": "2019-06-29T00:48:26.910433",
              "phones": [],
              "company_emails": [],
              "company_name": "logix - test",
              "state": "Heliopolis",
              "country": "egypt",
              "city": "cairo",
              "postal_code": "123456",
              "street": "Marghany"
            },
            "amount_cents": 2000,
            "shipping_data": {
              "id": 2558893,
              "first_name": "abdulrahman",
              "last_name": "Khalifa",
              "street": "Wadi el Nile",
              "building": "5",
              "floor": "11",
              "apartment": "1565162",
              "city": "Cairo",
              "state": "Cairo",
              "country": "EG",
              "email": "abdulrahman@weaccept.co",
              "phone_number": "01011994353",
              "postal_code": "",
              "extra_description": " ",
              "shipping_method": "UNK",
              "order_id": 4778239,
              "order": 4778239
            },
            "shipping_details": {
              "id": 1401,
              "cash_on_delivery_amount": 0,
              "cash_on_delivery_type": "Cash",
              "latitude": null,
              "longitude": null,
              "is_same_day": 0,
              "number_of_packages": 1,
              "weight": 1,
              "weight_unit": "Kilogram",
              "length": 1,
              "width": 1,
              "height": 1,
              "delivery_type": "PUD",
              "return_type": null,
              "order_id": 4778239,
              "notes": "im so tired",
              "order": 4778239
            },
            "currency": "EGP",
            "is_payment_locked": false,
            "is_return": false,
            "is_cancel": false,
            "is_returned": false,
            "is_canceled": false,
            "merchant_order_id": null,
            "wallet_notification": null,
            "paid_amount_cents": 100,
            "notify_user_with_email": false,
            "items": [],
            "order_url": "https://accept.paymobsolutions.com/i/nYWD",
            "commission_fees": 0,
            "delivery_fees_cents": 0,
            "delivery_vat_cents": 0,
            "payment_method": "tbc",
            "merchant_staff_tag": null,
            "api_source": "OTHER",
            "pickup_data": null,
            "delivery_status": []
          },
          "created_at": "2020-03-25T18:39:44.719228",
          "transaction_processed_callback_responses": [],
          "currency": "EGP",
          "source_data": {
            "pan": "2346",
            "type": "card",
            "sub_type": "MasterCard"
          },
          "api_source": "IFRAME",
          "terminal_id": null,
          "is_void": false,
          "is_refund": false,
          "data": {
            "acq_response_code": "00",
            "avs_acq_response_code": "Unsupported",
            "klass": "VPCPayment",
            "receipt_no": "008603626261",
            "order_info": "claudette09@exa.com",
            "message": "Approved",
            "gateway_integration_pk": 6741,
            "batch_no": "20200325",
            "card_num": null,
            "secure_hash": "832F4673452F9538CCD57D6B07B74183A0EEB1BEF7CA58704E31B244E8366549",
            "avs_result_code": "Unsupported",
            "card_type": "MC",
            "merchant": "TEST999999EGP",
            "created_at": "2020-03-25T16:40:37.127504",
            "merchant_txn_ref": "6741_572e773a5a0f55ff8de91876075d023e",
            "authorize_id": "626261",
            "currency": "EGP",
            "amount": "100",
            "transaction_no": "2090026774",
            "txn_response_code": "0",
            "command": "pay"
          },
          "is_hidden": false,
          "payment_key_claims": {
            "lock_order_when_paid": true,
            "integration_id": 6741,
            "billing_data": {
              "email": "claudette09@exa.com",
              "building": "8028",
              "apartment": "803",
              "street": "Ethan Land",
              "country": "CR",
              "state": "Utah",
              "last_name": "Nicolas",
              "first_name": "Clifford",
              "postal_code": "01898",
              "extra_description": "NA",
              "phone_number": "+86(8)9135210487",
              "floor": "42",
              "city": "Jaskolskiburgh"
            },
            "order_id": 4778239,
            "user_id": 4705,
            "pmk_ip": "197.57.37.135",
            "exp": 1585157836,
            "currency": "EGP",
            "amount_cents": 100
          },
          "error_occured": false,
          "is_live": false,
          "other_endpoint_reference": null,
          "refunded_amount_cents": 0,
          "source_id": -1,
          "is_captured": false,
          "captured_amount": 0,
          "merchant_staff_tag": null,
          "owner": 4705,
          "parent_transaction": null
        },
        "type": "TRANSACTION"
      }';


  $response = json_decode($response);
  $amount_cents = $response->obj->amount_cents;
  $order_created_at = $response->obj->order->created_at;
  $currency = $response->obj->order->currency;
  $error_occured = $response->obj->error_occured;
  $has_parent_transaction = $response->obj->has_parent_transaction;
  $transaction_id = $response->obj->id;
  $integration_id = $response->obj->integration_id;
  $is_3d_secure = $response->obj->is_3d_secure;
  $is_auth = $response->obj->is_auth;
  $is_capture = $response->obj->is_capture;
  $is_refunded = $response->obj->is_refunded;
  $is_standalois_capturene_payment = $response->obj->is_standalois_capturene_payment;
  $is_voided = $response->obj->is_voided;

  $order_id = $response->obj->order->id;
  $owner = $response->obj->owner;
  $pending = $response->obj->pending;
  $source_data_pan = $response->obj->source_data->pan;
  $source_data_sub_type = $response->obj->source_data->sub_type;
  $success = $response->obj->success;


  $request_string =  $amount_cents . $order_created_at . $currency . $error_occured . $has_parent_transaction . $transaction_id . $integration_id . $is_3d_secure . $is_auth . $is_capture . $is_refunded . $is_standalois_capturene_payment . $is_voided . $order_id . $owner . $pending . $source_data_pan . $source_data_sub_type . $success;

  $hashed = hash_hmac('SHA512', $request_string, 'DF42E0CDDDEABBC182E7297FC4C0206B');

  $secure_hash = $response->obj->data->secure_hash;
  return $request_string . '1002020-03-25T18:39:44.719228EGPfalsefalse25567066741truefalsefalsefalsetruefalse47782394705false2346MasterCardcardtrue
      ' . "<br>" . "<br>" . $hashed . "<br>" . $secure_hash;
});

require __DIR__ . '/auth.php';
