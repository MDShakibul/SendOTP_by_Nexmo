<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function index(){
        return view('send_otp');
    }

    public function send(Request $request){
        $code = rand(111111,999999);
        //dd($code);

        $data = new Otp;
        $data->phone_number = $request->phone_number;
        $data->otp = $code;

        $data->save();

        $nexmo=app('Nexmo\Client');
        $nexmo->message()->send([
            'to'=>'+880'.(int) $request->phone_number,
            'from'=> 'Shakibul',
            'text'=>'Please do not share this code.Your verify code: '.$code,
        ]);

        if( $nexmo){
            return redirect('/confirm-otp');
        }else{
            return back()->withMessage('You doing wrong');
        }

    }

    public function confirm_page(){
        return view('confrim_otp');
    }

    public function confirm(Request $request){
        $check=Otp::where('otp',$request->code)->first();
         if( $check){
             $check->otp=Null;
             $check->save();
             return redirect('/home');
         }else{
             return back()->withMessage('Verify code is not correct');
         }
    }

    public function home(){
        return view('home');
    }
}
