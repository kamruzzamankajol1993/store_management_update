<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Vendor;
use App\Models\Warehouse;
use App\Models\Product;
use App\Models\Sell;
use App\Models\Selldetail;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Models\Purchase;
use App\Models\Purchasedetail;
class PurchaseController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }



    public function index(){

        if (is_null($this->user) || !$this->user->can('inventory_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view Product List !');
        }

        $request_product_list = Purchase::latest()->limit(10)->get();

        return view('backend.purchase.index',compact('request_product_list'));
    }


    public function create()
    {

        if (is_null($this->user) || !$this->user->can('inventory_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view inventort List !');


        }

        $supplier_list = Client::latest()->get();
        $rack_list = Brand::latest()->get();
        $product_names = Product::latest()->get();
        return view('backend.purchase.create', compact('rack_list','supplier_list','product_names'));

    }



    public function view($id){

        $invoice =  Purchase::where('id',$id)->first();
        $invoice_detail = Purchasedetail::where('request_id',$id)->get();



        return view('backend.purchase.view',compact('invoice','invoice_detail'));

    }


    public function print($id){

        $invoice =  Purchase::where('id',$id)->first();
        $invoice_detail = Purchasedetail::where('request_id',$id)->get();

$file_Name_Custome = 'purchase_invoice';

        $pdf=PDF::loadView('backend.purchase.print',['invoice'=>$invoice,'invoice_detail'=>$invoice_detail],[],['format' => [75, 100]]);
return $pdf->stream($file_Name_Custome.''.'.pdf');

    }


    public function edit($id){

        $invoice =  Purchase::where('id',$id)->first();
        $invoice_detail = Purchasedetail::where('request_id',$id)->get();
        $vendors = Vendor::latest()->get();
        $supplier_list = Client::latest()->get();
        $rack_list = Brand::latest()->get();
        $product_names = Product::latest()->get();

        return view('backend.purchase.edit',compact('rack_list','supplier_list','product_names','vendors','invoice','invoice_detail'));

    }



    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('inventory_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any product !');

             //return redirect('/admin/logout_session');
        }


        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->request_date));

        $s_pay_date1 = date("Y-m-d", strtotime($request->request_delivery_date));
        //dd($input);


    $database_save = new Purchase();
    $database_save->vendor_id = $request->vendor_id;
    $database_save->request_number = $request->request_number;
    $database_save->request_date = $s_pay_date;
    $database_save->request_note = $request->request_note;
    $database_save->total_product = $request->total_product;
    $database_save->total_quantity = $request->total_quantity;
    $database_save->urgent =$request->urgent_type;
    $database_save->request_delivery_date = $s_pay_date1;
    $database_save->term = $request->payment_term;
    $database_save->status = $request->status;
    $database_save->save();


    $invoice_id = $database_save->id;











    return redirect('admin/inventory_information')->with('success','Created Successfully');
}


public function update(Request $request){



    if (is_null($this->user) || !$this->user->can('inventory_update')) {
        abort(403, 'Sorry !! You are Unauthorized to add any product !');

         //return redirect('/admin/logout_session');
    }


    $input = $request->all();

   // dd($input['nmain_product_id']);

    $s_pay_date = date("Y-m-d", strtotime($request->request_date));

    $s_pay_date1 = date("Y-m-d", strtotime($request->request_delivery_date));
    //dd($input);


$database_save = Purchase::find($request->id);
$database_save->vendor_id = $request->vendor_id;
    $database_save->request_number = $request->request_number;
$database_save->request_date = $s_pay_date;
$database_save->request_note = $request->request_note;
$database_save->total_product = $request->total_product;
$database_save->total_quantity = $request->total_quantity;
$database_save->urgent =$request->urgent_type;
$database_save->request_delivery_date = $s_pay_date1;
$database_save->term = $request->payment_term;
$database_save->status = $request->status;
$database_save->save();


$invoice_id = $database_save->id;


return redirect('admin/inventory_information')->with('success','Created Successfully');

}


public function delete($id)
{
    //dd(1);
    if (is_null($this->user) || !$this->user->can('inventory_delete')) {
        abort(403, 'Sorry !! You are Unauthorized to delete any data !');
    }
    $admins = Purchase::find($id);
    if (!is_null($admins)) {
        $admins->delete();
    }

    return redirect('admin/purchase_information')->with('error','Deleted Successfully');
}

}
