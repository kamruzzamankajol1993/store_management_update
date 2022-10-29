<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
class UnitController extends Controller
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
        if (is_null($this->user) || !$this->user->can('unit_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any unit !');
        }
        $users = Unit::all();

        return view('backend.unit.index', compact('users'));
    }





    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('unit_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any unit !');
        }


        // Create New User
        $admins = new Unit();

        $admins->name = $request->name;


        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('unit_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any unit !');
        }
        // Create New User
        $admins = Unit::find($request->id);




        $admins->name = $request->name;


        $admins->save();




        return back()->with('info','Updated successfully!');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('unit_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any unit !');
        }
        $admins = Unit::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
