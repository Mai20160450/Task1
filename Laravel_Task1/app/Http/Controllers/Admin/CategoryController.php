<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
use DB;
class CategoryController extends Controller
{
    //

    public function Allcategories(Request $request){
    	$all = Categories::all();
    	return view('admin.index_categories',['all_cats'=>$all]);
    }

    public function editCategory($id){

    	$cate = Categories::where('id',$id)->update(['name' => request('name') ,]);
    	return redirect(aurl('index_categories'));

    }
    public function show_edit($id){
    	$info = Categories::find($id);
    	// return dd($data);
    	return view('admin.edit_category' , ['data'=>$info]);
    }

    public function deleteCategory($id){
    	$del = Categories::find($id);
    	$del->delete();
    	return redirect(aurl('index_categories'));
    }

    public function showCategory($id){
    	$info = Categories::find($id);
    	return view('admin.show_category' , ['data'=>$info]);
    }

    public function add_cat(){
    	$AttributeNames = [
	    		'name' =>'Name Category',
	    	];

    	$tabel = $this->validate(request(),[
	    		'name' =>'required',
	    	] ,[],$AttributeNames);

    	$result = DB::table('categories')->insertGetId($tabel);
    	return redirect(aurl('index_categories'));
    }
}
