<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;
class WarehouseController extends Controller
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
        if (is_null($this->user) || !$this->user->can('ware_house_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any warehouse !');
        }
        $users = Warehouse::all();

        return view('backend.warehouse.index', compact('users'));
    }





    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('ware_house_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any warehouse !');
        }


        // Create New User
        $admins = new Warehouse();

        $admins->name = $request->name;
        $admins->adress = $request->adress;
        $admins->city = $request->city;
        $admins->state = $request->state;
        $admins->phone = $request->phone;
        $admins->email = $request->email;


        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('ware_house_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any warehouse !');
        }
        // Create New User
        $admins = Warehouse::find($request->id);




        $admins->name = $request->name;
        $admins->adress = $request->adress;
        $admins->city = $request->city;
        $admins->state = $request->state;
        $admins->phone = $request->phone;
        $admins->email = $request->email;


        $admins->save();




        return back()->with('info','Updated successfully!');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('ware_house_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any warehouse !');
        }
        $admins = Warehouse::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
