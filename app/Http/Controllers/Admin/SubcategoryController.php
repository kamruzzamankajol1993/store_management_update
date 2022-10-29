<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
class SubcategoryController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
     public function index()
    {
        if (is_null($this->user) || !$this->user->can('sub_category_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any sub_category !');
        }
        $users = Subcategory::all();
        $users1 = Category::all();

        return view('backend.sub_category.index', compact('users','users1'));
    }





    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('sub_category_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any sub_category !');
        }


        // Create New User
        $admins = new Subcategory();

        $admins->name = $request->name;
        $admins->sub_cate = $request->sub_cate;

        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('sub_category_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any sub_category !');
        }
        // Create New User
        $admins = Subcategory::find($request->id);




        $admins->name = $request->name;
        $admins->sub_cate = $request->sub_cate;

        $admins->save();




        return back()->with('info','Updated successfully!');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('sub_category_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any sub_category !');
        }
        $admins = Subcategory::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function get_subcat_from_cat(Request $request){

      $name = $request->id_country12;

      $get_list = Subcategory::where('sub_cate',$name)->get();

      $data = view('backend.sub_category.get_subcat_from_cat',compact('get_list'))->render();
            return response()->json($data);

    }
}
