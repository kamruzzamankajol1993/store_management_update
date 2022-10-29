<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\General;
use App\Models\Tax;
class GeneralController extends Controller
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
        if (is_null($this->user) || !$this->user->can('general_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any general setting !');
        }
        $users = General::all();
        $tax_list =Tax::latest()->get();

        return view('backend.general.index', compact('users','tax_list'));
    }


    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('general_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any general setting !');
        }


        // Create New User
        $admins = new General();
        $admins->decimal_separator = $request->decimal_separator;
        $admins->thousand_separator = $request->thousand_separator;
        $admins->number_off_padding_zero = $request->number_off_padding_zero;
        $admins->show_tax_per_item = $request->show_tax_per_item;
        $admins->remove_tax_from_item_table_row = $request->remove_tax_from_item_table_row;
        $admins->exclude_cur_symbol_from_item_table_amount = $request->exclude_cur_symbol_from_item_table_amount;
        $admins->default_tax = $request->default_tax;
        $admins->remove_dec_on_numbermoney = $request->remove_dec_on_numbermoney;
        $admins->output_total_number_in_es_pro = $request->output_total_number_in_es_pro;
        $admins->number_word_in_lowercase = $request->number_word_in_lowercase;

        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('general_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any general setting !');
        }
        // Create New User
        $admins = General::find($request->id);

        $admins->decimal_separator = $request->decimal_separator;
        $admins->thousand_separator = $request->thousand_separator;
        $admins->number_off_padding_zero = $request->number_off_padding_zero;
        $admins->show_tax_per_item = $request->show_tax_per_item;
        $admins->remove_tax_from_item_table_row = $request->remove_tax_from_item_table_row;
        $admins->exclude_cur_symbol_from_item_table_amount = $request->exclude_cur_symbol_from_item_table_amount;
        $admins->default_tax = $request->default_tax;
        $admins->remove_dec_on_numbermoney = $request->remove_dec_on_numbermoney;
        $admins->output_total_number_in_es_pro = $request->output_total_number_in_es_pro;
        $admins->number_word_in_lowercase = $request->number_word_in_lowercase;

        $admins->save();




        return back()->with('info','Updated successfully!');
    }
}
