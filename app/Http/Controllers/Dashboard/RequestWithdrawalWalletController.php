<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestWithdrawalWallet;

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

        try {

            DB::beginTransaction();

            RequestWithdrawalWallet::create([
                'user_id' => Auth::id(),
                'phone' => $request->phone,
                'amount' => $request->amount,
            ]);


            $user = User::find(Auth::id())->decrement('wallet',$request->amount);

            DB::commit();

        } catch( \Exception $e) {
            
            DB::rollback();
            return $e;
        }


        return redirect()->route('marketing')->with(['success' => 'تم تقديم طلب السحب بنجاح سوف نراجع طلبك وسوف يتم تحويل المبلخ اليك في خلال 48 ساعة']);
    }

    public function transfer($id)
    {
        $request = RequestWithdrawalWallet::find($id);

        if (!$request) {
            return redirect()->route('dashboard');
        }


        $request->delete();

        return redirect()->route('request.withdrawal.index')->with(['success' => 'Transfered Successfuly']);
    }

    public function transfered()
    {
        $requestWithdrawalWallet = RequestWithdrawalWallet::with('user')->onlyTrashed()->paginate(10);

    
        return view('dashboard.RequestWithdrawalWallet.transfered',compact('requestWithdrawalWallet'));
    }
}
