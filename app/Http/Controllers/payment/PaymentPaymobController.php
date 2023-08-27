<?php

namespace App\Http\Controllers\payment;

use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\UserBuyCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\RequiredIf;

class PaymentPaymobController extends Controller
{
    public function PayByPaymob(Request $request)
    {

        
        $validate = $request->validate([
            'paymentMethod' => 'required|in:wallet,credit',
            'phone' => ['required_if:paymentMethod,wallet'],
        ]);


        $course = Course::findOrFail($request->course_id);

        $user = Auth::guard('web')->user();




        if ($request->paymentMethod == 'credit') {

            $response = $this->paymentStepsIntegration($course, $user, 4111767);

            $token = $response['token'];

            Order::create([
                'user_id' => Auth::id(),
                'course_id' => $course->id,
                'price' =>  $course->price,
                'currency' =>  "EGP",
                'order_id' =>  $response['order_id'],
                'buyBy' =>  $request->buyBy,
            ]);
            return view('payment.payByCredit', compact('token'));
        }

        $response = $this->PayByWallet($course, $user, $request->phone);

        Order::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'price' =>  $course->price,
            'order_id' =>  $response['order_id'],
            'buyBy' =>  $request->buyBy,
        ]);

        if (!$response['redirect_url']) {
            return redirect()->back()->with(['error' => 'هذا الرقم غير صحيح او لا يحتوي على محفظة']);
        }

        return Redirect::to($response['redirect_url']);
    }


    public function paymentStepsIntegration($course, $user, $integration_id)
    {
        $response = Http::withHeaders([

            "Content-Type" => "application/json",

        ])->post('https://accept.paymob.com/api/auth/tokens', [
            'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T0RneE1qUXlMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuMUtBMnJ5V2NoRjhwVEtyOTU5M05UV3dQMUZVTzRrNVk1blVUWklfYVNlOUZjcjRMa0ZqcmMzOEVVZ1czemhuYkZSM0J0TlA5TUp4ZmdBZzB1WXYzWkE=',
        ]);

        $token = $response['token'];

        $response = Http::withHeaders([

            "Content-Type" => "application/json",

        ])->post('https://accept.paymob.com/api/ecommerce/orders', [
            'auth_token' => $token,
            'delivery_needed' => 'false',
            'amount_cents' => $course->price * 100,
            "currency" => "EGP",
            "items" => []
        ]);

        $id = $response['id'];

        $response = Http::withHeaders([

            "Content-Type" => "application/json",

        ])->post('https://accept.paymob.com/api/acceptance/payment_keys', [
            'auth_token' => $token,
            'amount_cents' => $course->price * 100,
            "expiration" => 3600,
            "order_id" => $id,
            "currency" => "EGP",
            'billing_data' => [
                "apartment" => "803",
                "email" => $user->email,
                "floor" => "42",
                "first_name" => $user->first_name ?? "NA",
                "street" => "Ethan Land",
                "building" => "8028",
                "phone_number" => "+86(8)9135210487",
                "shipping_method" => "PKG",
                "postal_code" => "01898",
                "city" => "Cairo",
                "country" => "CR",
                "last_name" => $user->last_name ?? "NA",
                "state" => "Utah"
            ],
            "integration_id" => $integration_id,
            "lock_order_when_paid" => "false"

        ]);

        $token = $response['token'];

        return ['token' => $token, 'order_id' => $id];
    }

    public function PayByWallet($course, $user, $phone)
    {
        $response = $this->paymentStepsIntegration($course, $user, 4121943);

        $token = $response['token'];

        $order_id = $response['order_id'];

        $response = Http::withHeaders([

            "Content-Type" => "application/json",

        ])->post('https://accept.paymob.com/api/acceptance/payments/pay', [
            'source' => [
                "identifier" => $phone,
                "subtype" => "WALLET"
            ],
            'payment_token' => $token,

        ]);

        return ['redirect_url' => $response['redirect_url'], 'order_id' => $order_id];
    }

    public function state(Request $request)
    {


        $amount_cents                           = $request->amount_cents;
        $created_at                             = $request->created_at;
        $currency                               = $request->currency;
        $error_occured                          = $request->error_occured;
        $has_parent_transaction                 = $request->has_parent_transaction;
        $obj_id                                 = $request->id;
        $integration_id                         = $request->integration_id;
        $is_3d_secure                           = $request->is_3d_secure;
        $is_auth                                = $request->is_auth;
        $is_capture                             = $request->is_capture;
        $is_refunded                            = $request->is_refunded;
        $is_standalone_payment                  = $request->is_standalone_payment;
        $is_voided                              = $request->is_voided;
        $order_id                               = $request->id;
        $owner                                  = $request->owner;
        $pending                                = $request->pending;
        $source_data_pan                        = $request->source_data_pan;
        $source_data_sub_type                   = $request->source_data_sub_type;
        $source_data_type                       = $request->source_data_type;
        return $success                                = $request->success;


        $str = $amount_cents . $created_at . $currency . $error_occured . $has_parent_transaction . $obj_id . $integration_id . $is_3d_secure . $is_auth . $is_capture . $is_refunded . $is_standalone_payment . $is_voided . $order_id . $owner . $pending . $source_data_pan . $source_data_sub_type . $source_data_type . $success;

        $secure_hash = $request->hmac;

        $hamc = hash_hmac('sha512', $str, 'BE1EDE20CEDC0DEF69ABFFCA5B4971D0');

        if ($hamc == $secure_hash) {
           return "good"; 
        }
        return $hamc . '<br>' . $secure_hash;
        // if ($success && $request->hmac) {

        //     $order = Order::where('order_id', $order)->first();
        //     $order->update([
        //         'transaction_id' => $transaction_id,
        //         'payment_method' => 'paymob',
        //         'payment_type' => $source_data_type,
        //         'status' => 'success',
        //     ]);

        //     if ($order->buyBy != null) {

        //         $user = User::find($order->buyBy);
        //         $rate = 20 / 100;

        //         $increment = $rate * $order->price;

        //         $user->increment('wallet', $increment);
        //     }

        //     return $order;
        // }
        // $order = Order::where('order_id', $order)->first();
        // $order->update([
        //     'transaction_id' => $transaction_id,
        //     'payment_method' => 'paymob',
        //     'payment_type' => $source_data_type,
        //     'status' => 'failed',
        // ]);

        // return  $order;
    }

    function paymobCallback(Request $request)
    {



        
        $amount_cents                           = $request['obj']['amount_cents'];
        $created_at                             = $request['obj']['created_at'];
        $currency                               = $request['obj']['order']['currency'];
        $error_occured                          = $request['obj']['error_occured'] ? 'true' : 'false';
        $has_parent_transaction                 = $request['obj']['has_parent_transaction'] ? 'true' : 'false';
        $obj_id                                 = $request['obj']['id'];
        $integration_id                         = $request['obj']['integration_id'];
        $is_3d_secure                           = $request['obj']['is_3d_secure'] ? 'true' : 'false';
        $is_auth                                = $request['obj']['is_auth'] ? 'true' : 'false';
        $is_capture                             = $request['obj']['is_capture'] ? 'true' : 'false';
        $is_refunded                            = $request['obj']['is_refunded'] ? 'true' : 'false';
        $is_standalone_payment                  = $request['obj']['is_standalone_payment'] ? 'true' : 'false';
        $is_voided                              = $request['obj']['is_voided'] ? 'true' : 'false';
        $order_id                               = $request['obj']['order']['id'];
        $owner                                  = $request['obj']['owner'];
        $pending                                = $request['obj']['pending'] ? 'true' : 'false';
        $source_data_pan                        = $request['obj']['source_data']['pan'];
        $source_data_sub_type                   = $request['obj']['source_data']['sub_type'];
        $source_data_type                       = $request['obj']['source_data']['type'];
        $success                                = $request['obj']['success'];

        $isSecure = $this->calculateHash($request);

        if ($isSecure) {

            if ($success) {

                $order = Order::where('order_id', $order_id)->first();
                $order->update([
                    'transaction_id' => $obj_id,
                    'payment_method' => 'paymob',
                    'payment_type' =>  $source_data_type,
                    'status' => 'success',
                ]);
    
                if ($order->buyBy != null) {
    
                    $user = User::find($order->buyBy);
                    $rate = 20 / 100;
    
                    $increment = $rate * $order->price;
    
                    $user->increment('wallet', $increment);
                }

                UserBuyCourse::create([
                    'user_id' => $order->user_id,
                    'course_id' => $order->course_id,
                ]);

                return $order;

            } else {
                $order = Order::where('order_id', $order_id)->first();
                $order->update([
                    'transaction_id' => $obj_id,
                    'payment_method' => 'paymob',
                    'payment_type' =>  $source_data_type,
                    'status' => 'failed',
                ]);
            }
   


        }

        Log::debug($success);

    
    }

    private function calculateHash($json)
    {
        if (!$json) return false;

        $amount_cents                           = $json['obj']['amount_cents'];
        $created_at                             = $json['obj']['created_at'];
        $currency                               = $json['obj']['order']['currency'];
        $error_occured                          = $json['obj']['error_occured'] ? 'true' : 'false';
        $has_parent_transaction                 = $json['obj']['has_parent_transaction'] ? 'true' : 'false';
        $obj_id                                 = $json['obj']['id'];
        $integration_id                         = $json['obj']['integration_id'];
        $is_3d_secure                           = $json['obj']['is_3d_secure'] ? 'true' : 'false';
        $is_auth                                = $json['obj']['is_auth'] ? 'true' : 'false';
        $is_capture                             = $json['obj']['is_capture'] ? 'true' : 'false';
        $is_refunded                            = $json['obj']['is_refunded'] ? 'true' : 'false';
        $is_standalone_payment                  = $json['obj']['is_standalone_payment'] ? 'true' : 'false';
        $is_voided                              = $json['obj']['is_voided'] ? 'true' : 'false';
        $order_id                               = $json['obj']['order']['id'];
        $owner                                  = $json['obj']['owner'];
        $pending                                = $json['obj']['pending'] ? 'true' : 'false';
        $source_data_pan                        = $json['obj']['source_data']['pan'];
        $source_data_sub_type                   = $json['obj']['source_data']['sub_type'];
        $source_data_type                       = $json['obj']['source_data']['type'];
        $success                                = $json['obj']['success'] ? 'true' : 'false';


        $str = $amount_cents . $created_at . $currency . $error_occured . $has_parent_transaction . $obj_id . $integration_id . $is_3d_secure . $is_auth . $is_capture . $is_refunded . $is_standalone_payment . $is_voided . $order_id . $owner . $pending . $source_data_pan . $source_data_sub_type . $source_data_type . $success;

        $secure_hash = $json->hmac;

        $hamc = hash_hmac('sha512', $str, 'BE1EDE20CEDC0DEF69ABFFCA5B4971D0');

        return $hamc == $secure_hash ? true : false;
    }
}
