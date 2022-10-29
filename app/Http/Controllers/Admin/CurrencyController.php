<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Currency;
class CurrencyController extends Controller
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
        if (is_null($this->user) || !$this->user->can('currency_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any currency !');
        }
        $users = Currency::all();

        return view('backend.currency.index', compact('users'));
    }


    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('currency_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any currency !');
        }


        // Create New User
        $admins = new Currency();
        $admins->name = $request->name;
        $admins->symbol = $request->symbol;

        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('currency_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any currency !');
        }
        // Create New User
        $admins = Currency::find($request->id);



        $admins->name = $request->name;
        $admins->symbol = $request->symbol;

        $admins->save();




        return back()->with('info','Updated successfully!');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('currency_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any currency !');
        }
        $admins = Currency::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
