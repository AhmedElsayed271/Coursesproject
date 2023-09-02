<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    
    public function index() 
    {
        $contactsUs = ContactUs::paginate(10);

        return view('dashboard.conactUs.index',compact('contactsUs'));
    }


    public function create(Request $request)
    {

        $request->validate([
            'name' => "required|min:3",
            'email' => "required|email",
            'message' => "required",
        ], [
            'name.required' => 'الاسم مطلوب',
            'name.min' => 'الاسم يجب الا يقل عن ثلاثة احرف',
            'email.required' => 'البريد الاكتروني مطلوب',
            'message.required' => 'يجب ادخال الرسالة'
        ]);



        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message, 
        ]);
        $homeConactUs = route('home') . "#contactUs";
        return redirect($homeConactUs)->with(['success' => "sending Succssfuly"]);
    }

    public function destroy($id)
    {
        $contactUs = ContactUs::find($id);

        if (!$contactUs) {
            return redirect()->route('dashboard');
        }

        $contactUs->delete();


        return redirect()->route('contact.index')->with(['success' => "Deleted Successfuly"]);

    }

}
