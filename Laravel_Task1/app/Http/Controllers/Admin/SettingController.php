<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use DB;
class SettingController extends Controller
{
    //

public function inserte(Request $request){
    	// Setting::create([
    	// 	'name' =>request('name'),
    	// 	'email' =>request('email'),
    	// 	'keywords' =>request('keywords'),
    	// 	'desc' =>request('desc'),
    	// 	'main_message' =>request('main_message'),
    	// 	'maintenance' =>request('maintenance')
    	// ]);
    	$AttributeNames = [
	    		'title' =>trans('setting.title'),
	    	'user_id' =>trans('setting.user_id'),
	    	   	'desc' =>trans('setting.desc'),
	    		'content' =>trans('setting.content'),
	    		'status' =>trans('setting.status')
	    	];

    	$tabel = $this->validate(request(),[
	    		'name' =>'required',
	    		'email' =>'required',
	    		'keywords' =>'required',
	    		'desc' =>'required',
	    		'main_message' =>'required',
	    		'maintenance' =>'required',
	    	] ,[],$AttributeNames);

    	$result = DB::table('settings')->insertGetId($tabel);
    	return redirect(aurl('/'));
    }
}
