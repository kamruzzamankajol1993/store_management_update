<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\General;
use App\Models\Estimate;
use App\Models\Tax;
class EstimateController extends Controller
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
        if (is_null($this->user) || !$this->user->can('estimate_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any estimate setting !');
        }
        $users = Estimate::all();
        $tax_list =Tax::latest()->get();

        return view('backend.estimate.index', compact('users','tax_list'));
    }


    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('estimate_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any estimate setting !');
        }


        // Create New User
        $admins = new Estimate();
        $admins->estimate_number = $request->estimate_number;
        $admins->next_estimate_number = $request->next_estimate_number;
        $admins->estimate_due_after = $request->estimate_due_after;
        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('estimate_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any estimate setting !');
        }
        // Create New User
        $admins = Estimate::find($request->id);

        $admins->estimate_number = $request->estimate_number;
        $admins->next_estimate_number = $request->next_estimate_number;
        $admins->estimate_due_after = $request->estimate_due_after;

        $admins->save();




        return back()->with('info','Updated successfully!');
    }
}
