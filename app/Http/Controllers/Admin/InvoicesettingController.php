<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\General;
use App\Models\Invoicesetting;
use App\Models\Tax;
class InvoicesettingController extends Controller
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
        if (is_null($this->user) || !$this->user->can('invoice_setting_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any invoice setting !');
        }
        $users = Invoicesetting::all();
        $tax_list =Tax::latest()->get();

        return view('backend.invoice_setting.index', compact('users','tax_list'));
    }


    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('invoice_setting_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any invoice setting !');
        }


        // Create New User
        $admins = new Invoicesetting();
        $admins->invice_number = $request->invice_number;
        $admins->next_invoice_number = $request->next_invoice_number;
        $admins->invoice_due_after = $request->invoice_due_after;
        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('invoice_setting_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any invoice setting !');
        }
        // Create New User
        $admins = Invoicesetting::find($request->id);

        $admins->invice_number = $request->invice_number;
        $admins->next_invoice_number = $request->next_invoice_number;
        $admins->invoice_due_after = $request->invoice_due_after;

        $admins->save();




        return back()->with('info','Updated successfully!');
    }
}
