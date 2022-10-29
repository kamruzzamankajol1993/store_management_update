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
use App\Models\Requestproduct;
use App\Models\Requestproductdetail;
class RequestproductController extends Controller
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

        if (is_null($this->user) || !$this->user->can('request_product_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view Product List !');
        }

        $request_product_list = Requestproduct::latest()->limit(10)->get();

        return view('backend.request_product.index',compact('request_product_list'));
    }


    public function create()
    {

        if (is_null($this->user) || !$this->user->can('request_product_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view Product List !');


        }

        $vendors = Client::latest()->get();
        $product_names = Product::latest()->get();
        return view('backend.request_product.create', compact('vendors','product_names'));

    }



    public function view($id){

        $invoice =  Requestproduct::where('id',$id)->first();
        $invoice_detail = Requestproductdetail::where('request_id',$id)->get();



        return view('backend.request_product.view',compact('invoice','invoice_detail'));

    }


    public function print($id){

        $invoice =  Requestproduct::where('id',$id)->first();
        $invoice_detail = Requestproductdetail::where('request_id',$id)->get();

$file_Name_Custome = 'request_product_invoice';

        $pdf=PDF::loadView('backend.request_product.print',['invoice'=>$invoice,'invoice_detail'=>$invoice_detail],[],['format' => [75, 100]]);
return $pdf->stream($file_Name_Custome.''.'.pdf');

    }


    public function edit($id){

        $invoice =  Requestproduct::where('id',$id)->first();
        $invoice_detail = Requestproductdetail::where('request_id',$id)->get();
        $vendors = Client::latest()->get();
        $product_names = Product::latest()->get();

        return view('backend.request_product.edit',compact('product_names','vendors','invoice','invoice_detail'));

    }



    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('request_product_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any product !');

             //return redirect('/admin/logout_session');
        }


        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->pay_date));

        $s_pay_date1 = date("Y-m-d", strtotime($request->request_delivery_date));
        //dd($input);


    $database_save = new Requestproduct();
    $database_save->vendor_id = $request->vendor_name;
    $database_save->request_number = $request->order_id;
    $database_save->request_date = $s_pay_date;
    $database_save->request_note = $request->request_note;
    $database_save->total_product = $request->total_product;
    $database_save->total_quantity = $request->total_quantity;
    $database_save->urgent =$request->urgent_type;
    $database_save->request_delivery_date = $s_pay_date1;
    $database_save->term = $request->payment_term;
    $database_save->status = 'inc';
    $database_save->save();


    $invoice_id = $database_save->id;






    $condition_main_product_id = $input['nmain_product_id'];

        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Requestproductdetail();
            $form->product_id=$input['nmain_product_id'][$key];
            $form->request_id=$invoice_id;
            $form->quantity=$input['p_quantity'][$key];
            $form->save();

            //first table quantity update



    }
    return redirect('admin/request_product_information_view/'.$invoice_id)->with('success','Created Successfully');
}


public function update(Request $request){



    if (is_null($this->user) || !$this->user->can('request_product_update')) {
        abort(403, 'Sorry !! You are Unauthorized to add any product !');

         //return redirect('/admin/logout_session');
    }


    $input = $request->all();

   // dd($input['nmain_product_id']);

    $s_pay_date = date("Y-m-d", strtotime($request->pay_date));

    $s_pay_date1 = date("Y-m-d", strtotime($request->request_delivery_date));
    //dd($input);


$database_save = Requestproduct::find($request->id);
$database_save->vendor_id = $request->vendor_name;
$database_save->request_number = $request->order_id;
$database_save->request_date = $s_pay_date;
$database_save->request_note = $request->request_note;
$database_save->total_product = $request->total_product;
$database_save->total_quantity = $request->total_quantity;
$database_save->urgent =$request->urgent_type;
$database_save->request_delivery_date = $s_pay_date1;
$database_save->term = $request->payment_term;
$database_save->status = 'inc';
$database_save->save();


$invoice_id = $database_save->id;


$delete_id = Requestproductdetail::where('request_id',$invoice_id)->delete();



$condition_main_product_id1 = $input['nmain_product_id'];

    foreach($condition_main_product_id1 as $key => $tcondition_main_product_id){
        $form= new Requestproductdetail();
        $form->product_id=$input['nmain_product_id'][$key];
        $form->request_id=$invoice_id;
        $form->quantity=$input['p_quantity'][$key];
        $form->save();

        //first table quantity update



}
return redirect('admin/request_product_information_view/'.$invoice_id)->with('success','Created Successfully');

}


public function delete($id)
{
    //dd(1);
    if (is_null($this->user) || !$this->user->can('request_product_delete')) {
        abort(403, 'Sorry !! You are Unauthorized to delete any data !');
    }
    $admins = Requestproduct::find($id);
    if (!is_null($admins)) {
        $admins->delete();
    }

    return redirect('admin/request_product_information')->with('error','Deleted Successfully');
}
}
