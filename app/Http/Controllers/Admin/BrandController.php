<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
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
        if (is_null($this->user) || !$this->user->can('brand_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any brand !');
        }
        $users = Brand::all();

        return view('backend.brand.index', compact('users'));
    }





    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('brand_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any brand !');
        }


        // Create New User
        $admins = new Brand();

        $admins->name = $request->name;
        $admins->status = $request->status;


        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('brand_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any brand !');
        }
        // Create New User
        $admins = Brand::find($request->id);




        $admins->name = $request->name;
        $admins->status = $request->status;

        $admins->save();




        return back()->with('info','Updated successfully!');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('brand_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any brand !');
        }
        $admins = Brand::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
