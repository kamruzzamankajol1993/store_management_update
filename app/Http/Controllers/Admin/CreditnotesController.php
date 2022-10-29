<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tax;
use App\Models\Creditnote;
class CreditnotesController extends Controller
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
        $users = Creditnote::all();
        $tax_list =Tax::latest()->get();

        return view('backend.credit_note.index', compact('users','tax_list'));
    }


    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('estimate_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any estimate setting !');
        }


        // Create New User
        $admins = new Creditnote();
        $admins->credit_note_number_prefix = $request->credit_note_number_prefix;
        $admins->next_credit_note_number = $request->next_credit_note_number;

        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('estimate_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any estimate setting !');
        }
        // Create New User
        $admins = Creditnote::find($request->id);

        $admins->credit_note_number_prefix = $request->credit_note_number_prefix;
        $admins->next_credit_note_number = $request->next_credit_note_number;

        $admins->save();




        return back()->with('info','Updated successfully!');
    }
}
