<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
// Illuminate\Support\Facades\Request::class
use App\Admin;
use Carbon\Carbon;
use DB;
use Mail;
use Crypt;
class AdminAuth extends Controller
{
    //
    public function login(){
    	return view('admin.login');
    }

    public function loginaction(){
    	$remeberme = request('rememberme') == 1?true:false;
    	if(admin()->attempt(['email'=>request('email') , 'password'=>request('password')  ],$remeberme)){
                Admin::where('email',request('email'))->update([
                'last_login_at' => Carbon::now()->toDateTimeString(),          
            ]);
    		return redirect('admin');
    	}else{
    		session()->flash('error' , trans('admin.inccorect_information_login'));
    		 return redirect(aurl('login'));
    	}
    }

    public function logout(){
    	auth()->guard('admin')->logout();
    	return redirect(aurl('login'));
    }

    public function forgot_password(){
    	
    	return view('admin.forgot_password');
    }

    public function forgot_password_post(){
    	$admin = Admin::where('email',request('email'))->first();

    	if(!empty($admin)){
    		$token = app('auth.password.broker')->createToken($admin);
    		$data = DB::table('password_resets')->insert([
    			'email'=>$admin->email,
    			'token'=>$token,
    			'created_at' => Carbon::now(),
    		]);
    		Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin , 'token'=>$token]));
    		session()->flash('seccess', trans( 'admin.the_link_is_resst'));
    		return back();
    	}
    	return back();
    }

    public function reset_password($token){
    	$check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
    	if(!empty($check_token) ){
    		return view('admin.reset_password' , ['data'=>$check_token]);
    }else{
    	return redirect(aurl('forgotpassword'));
    	}
	}

	public function reset_password_final($token){
		$this->validate(request(),[
			'password'=> 'required|confirmed',
			'password_confirmation' =>'required']
			,[],[
				'password'=>'password',
				'password_confirmation' =>'password_confirmation']);
		$check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
    	if(!empty($check_token) ){
    		$admin = Admin::where('email',$check_token->email)->update(['email' => $check_token->email ,
    	     'password'=>bcrypt(request('password'))]);
    		DB::table('password_resets')->where('email',request('email'))->delete();
    		admin()->attempt(['email'=> $check_token->email, 'password'=>request('password')  ],true);
    		return redirect(aurl());
    	}else{
    		return redirect(aurl('forgotpassword'));
    	}
	}
//     public function change_password(){
//         return view('admin.change_password');
//     }

//     public function change_password_action(){

//         $this->validate(request(),[
//             'current_password' => 'required',
//             'new_password'=> 'required|same:new_password',
//             'password_confirmation' =>'required|same:new_password']
//             ,[],[
//                 'current_password'=>'current_password',
//                 'New_password' =>'New_password',
//                 'password_confirmation' =>'password_confirmation']);

// // if(Crypt::encrypt(check($request_data['current-password'], $current_password))
//         $password = admin()->user()->password;
//         $current = bcrypt(request('current_password'));
//         if(check($current , $password)){

//             $admin = Admin::where('email',admin()->user()->email)->update(['email' => admin()->user()->email ,
//              'password'=>bcrypt(request('new_password'))]);
//             DB::table('password_resets')->where('email',request('email'))->delete();
//             admin()->attempt(['email'=> admin()->user()->email, 'password'=>request('new_password')  ],true);
//             return redirect(aurl('login'));

//         }else{
            
//             return back();
//         }



//     }

}
