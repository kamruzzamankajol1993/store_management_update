<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Tax;
class TaxController extends Controller
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
        if (is_null($this->user) || !$this->user->can('tax_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any tax !');
        }
        $users = Tax::all();

        return view('backend.tax.index', compact('users'));
    }


    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('tax_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any tax !');
        }


        // Create New User
        $admins = new Tax();
        $admins->tax_name = $request->tax_name;
        $admins->tax_rate = $request->tax_rate;

        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('tax_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any tax !');
        }
        // Create New User
        $admins = Tax::find($request->id);

        $admins->tax_name = $request->tax_name;
        $admins->tax_rate = $request->tax_rate;

        $admins->save();




        return back()->with('info','Updated successfully!');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('tax_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any tax !');
        }
        $admins = Tax::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
