<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
class ClientController extends Controller
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
        if (is_null($this->user) || !$this->user->can('client_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any client !');
        }
        $users = Client::all();

        return view('backend.client.index', compact('users'));
    }


    public function view($id)
    {
        if (is_null($this->user) || !$this->user->can('client_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any client !');
        }
        $users = Client::where('id',$id)->first();

        return view('backend.client.view', compact('users'));
    }


    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('client_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any client !');
        }


        // Create New User
        $admins = new Client();
        $admins->customer_type = $request->customer_type;
        $admins->primary_contact = $request->primary_contact;
        $admins->company_name = $request->company_name;
        $admins->customer_display_name = $request->customer_display_name;
        $admins->phone = $request->phone;
        $admins->website = $request->website;
        $admins->email = $request->email;
        $admins->gst_treatment = $request->gst_treatment;
        $admins->pan = $request->pan;
        $admins->place_of_supply = $request->place_of_supply;
        $admins->status = $request->status;
        $admins->tax_preference = $request->tax_preference;
        $admins->currency = $request->currency;
        $admins->opening_balance = $request->opening_balance;
        $admins->payment_term = $request->payment_term;
        $admins->billing_attention = $request->billing_attention;
        $admins->billing_country_region = $request->billing_country_region;

        $admins->billing_address_one = $request->billing_address_one;
        $admins->billing_address_two = $request->billing_address_two;
        $admins->billing_city = $request->billing_city;
        $admins->billing_state = $request->billing_state;

        $admins->billing_zip_code = $request->billing_zip_code;
        $admins->billing_phone = $request->billing_phone;

        $admins->billing_fax = $request->billing_fax;
        $admins->shipping_attention = $request->shipping_attention;

        $admins->shipping_country_region = $request->shipping_country_region	;
        $admins->shipping_address_one = $request->shipping_address_one;
        $admins->shipping_address_two = $request->shipping_address_two;
        $admins->shipping_city = $request->shipping_city;
        $admins->shipping_state = $request->shipping_state;
        $admins->shipping_zip_code = $request->shipping_zip_code;
        $admins->shipping_phone = $request->shipping_phone;
        $admins->shipping_fax = $request->shipping_fax;

        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('client_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any client !');
        }
        // Create New User
        $admins = Client::find($request->id);



        $admins->customer_type = $request->customer_type;
        $admins->primary_contact = $request->primary_contact;
        $admins->company_name = $request->company_name;
        $admins->customer_display_name = $request->customer_display_name;
        $admins->phone = $request->phone;
        $admins->website = $request->website;
        $admins->email = $request->email;
        $admins->gst_treatment = $request->gst_treatment;
        $admins->pan = $request->pan;
        $admins->place_of_supply = $request->place_of_supply;
        $admins->status = $request->status;
        $admins->tax_preference = $request->tax_preference;
        $admins->currency = $request->currency;
        $admins->opening_balance = $request->opening_balance;
        $admins->payment_term = $request->payment_term;
        $admins->billing_attention = $request->billing_attention;
        $admins->billing_country_region = $request->billing_country_region;

        $admins->billing_address_one = $request->billing_address_one;
        $admins->billing_address_two = $request->billing_address_two;
        $admins->billing_city = $request->billing_city;
        $admins->billing_state = $request->billing_state;

        $admins->billing_zip_code = $request->billing_zip_code;
        $admins->billing_phone = $request->billing_phone;

        $admins->billing_fax = $request->billing_fax;
        $admins->shipping_attention = $request->shipping_attention;

        $admins->shipping_country_region = $request->shipping_country_region	;
        $admins->shipping_address_one = $request->shipping_address_one;
        $admins->shipping_address_two = $request->shipping_address_two;
        $admins->shipping_city = $request->shipping_city;
        $admins->shipping_state = $request->shipping_state;
        $admins->shipping_zip_code = $request->shipping_zip_code;
        $admins->shipping_phone = $request->shipping_phone;
        $admins->shipping_fax = $request->shipping_fax;

        $admins->save();




        return back()->with('info','Updated successfully!');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('client_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any client !');
        }
        $admins = Client::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
