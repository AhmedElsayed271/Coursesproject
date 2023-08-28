<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestWithdrawalWallet;
use Illuminate\Support\Facades\Auth;

class RequestWithdrawalWalletController extends Controller
{


    public function index() 
    {
        $requestWithdrawalWallet = RequestWithdrawalWallet::with('user')->paginate(10);

        return view('dashboard.RequestWithdrawalWallet.index',compact('requestWithdrawalWallet'));
    }

    
    public function create(Request $request)
    {

        $request->validate([
            'phone' => ['required','min:11','max:11'],
            'amount' => [
                'required'
                ,function ($attribute,$value,$fail) {

                    $userWallet = User::find(Auth::id())->wallet;

                    if ($value > $userWallet)
                    {
                        $fail('لا يمكنك سحب هذا المبلخ لان رصيدك اصغر من هذا المبلغ رصيدك الحالي ' . $userWallet);
                    }   

                },
                'gt:10',
            ],
         
        ]);

        RequestWithdrawalWallet::create([
            'user_id' => Auth::id(),
            'phone' => $request->phone,
            'amount' => $request->amount,
        ]);


        return redirect()->route('marketing')->with(['success' => 'تم تقديم طلب السحب بنجاح سوف نراجع طلبك وسوف يتم تحويل المبلخ اليك في خلال 48 ساعة']);
    }
}
