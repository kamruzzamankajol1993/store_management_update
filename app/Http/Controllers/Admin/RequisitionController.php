<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Requisition;
use App\Models\Product;
use App\Models\Rproduct;
use App\Models\Purchase;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class RequisitionController extends Controller
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
        if (is_null($this->user) || !$this->user->can('requisition_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any requisitions !');
        }
        $users = Admin::where('id','!=',1)->get();

        if(Auth::guard('admin')->user()->id == 1){
        $requisition_list = Requisition::latest()->get();
        }else{
            $requisition_list = Requisition::where('admin_id',Auth::guard('admin')->user()->id)->latest()->get();

        }
        return view('backend.requisition.index', compact('users','requisition_list'));
    }



    public function create()
    {
        if (is_null($this->user) || !$this->user->can('requisition_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any requisitions !');
        }
        $users = Admin::where('id','!=',1)->get();
        $product_names = Product::latest()->get();

        return view('backend.requisition.create', compact('users','product_names'));
    }



    public function edit($id){



        if (is_null($this->user) || !$this->user->can('requisition_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any requisitions !');
        }
        $users = Admin::where('id','!=',1)->get();
        $product_names = Product::latest()->get();

        $r_list = Requisition::where('id',$id)->latest()->first();

        $r_product_list = Rproduct::where('r_id',$id)->latest()->get();

        // dd('ee');

        return view('backend.requisition.edit', compact('r_product_list','r_list','users','product_names'));



    }




    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('requisition_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any requisition !');

             //return redirect('/admin/logout_session');
        }


        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->request_date));


        //dd($input);


    $database_save = new Requisition();
    if(Auth::guard('admin')->user()->id == 1){
    $database_save->admin_id = $request->admin_id;
    }else{
        $database_save->admin_id =Auth::guard('admin')->user()->id;
    }
    $database_save->request_type = $request->request_type;
    $database_save->request_date = $s_pay_date;
    $database_save->status = 'Accept';
    $database_save->save();


    $invoice_id = $database_save->id;






    $condition_main_product_id = $input['nmain_product_id'];

        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Rproduct();
            if(Auth::guard('admin')->user()->id == 1){
                $form->admin_id = $request->admin_id;
                }else{
                    $form->admin_id =Auth::guard('admin')->user()->id;
                }
            $form->product_id=$input['nmain_product_id'][$key];
            $form->r_id=$invoice_id;
            $form->quantity=$input['p_quantity'][$key];
            $form->save();

            //first table quantity update

              $catch_product_name = Product::where('id',$input['nmain_product_id'][$key])->value('name');

              $catch_quantity = Purchase::where('vendor_id',$catch_product_name)->value('total_quantity');


              $final_quantity = $catch_quantity - $input['p_quantity'][$key];


              $catch_previous_value1 = Purchase::where('vendor_id',$catch_product_name)
                ->update([
                    'total_quantity' => $final_quantity
                 ]);





    }
    return redirect('admin/requisition_information')->with('success','Created Successfully');
}



public function update(Request $request){

    if (is_null($this->user) || !$this->user->can('requisition_update')) {
        abort(403, 'Sorry !! You are Unauthorized to add any requisition !');

         //return redirect('/admin/logout_session');
    }


    $input = $request->all();

    $s_pay_date = date("Y-m-d", strtotime($request->request_date));


    //dd($input);


$database_save = Requisition::find($request->id);
if(Auth::guard('admin')->user()->id == 1){
    $database_save->admin_id = $request->admin_id;
    }else{
        $database_save->admin_id =Auth::guard('admin')->user()->id;
    }
$database_save->request_type = $request->request_type;
$database_save->request_date = $s_pay_date;
$database_save->status = 'Accept';
$database_save->save();


$invoice_id = $database_save->id;






$condition_main_product_id = $input['nmain_product_id'];

$dd_id = Rproduct::where('r_id',$invoice_id)->delete();

    foreach($condition_main_product_id as $key => $condition_main_product_id){
        $form= new Rproduct();
        if(Auth::guard('admin')->user()->id == 1){
            $form->admin_id = $request->admin_id;
            }else{
                $form->admin_id =Auth::guard('admin')->user()->id;
            }
        $form->product_id=$input['nmain_product_id'][$key];
        $form->r_id=$invoice_id;
        $form->quantity=$input['p_quantity'][$key];
        $form->save();

        //first table quantity update



}
return redirect('admin/requisition_information')->with('success','Updated Successfully');
}



public function delete($id)
{
    //dd(1);
    if (is_null($this->user) || !$this->user->can('requisition_delete')) {
        abort(403, 'Sorry !! You are Unauthorized to delete any data !');
    }
    $admins = Requisition::find($id);
    if (!is_null($admins)) {
        $admins->delete();
    }

    return redirect('admin/requisition_information')->with('error','Deleted Successfully');
}



public function status_requisition_information(Request $request){


    $s_pay_date = date("Y-m-d", strtotime($request->request_date));


    //dd($input);


$database_save = Requisition::find($request->id);
$database_save->request_date = $s_pay_date;
$database_save->status =$request->status;
$database_save->save();


$get_product = Rproduct::where('r_id',$request->id)->get();

foreach($get_product as $all_get_quantity){



    $catch_product_name = Product::where('id',$all_get_quantity->product_id)->value('name');

              $catch_quantity = Purchase::where('vendor_id',$catch_product_name)->value('total_quantity');


              $final_quantity = $catch_quantity - $all_get_quantity->quantity;


              $catch_previous_value1 = Purchase::where('vendor_id',$catch_product_name)
                ->update([
                    'total_quantity' => $final_quantity
                 ]);



}


return redirect('admin/requisition_information')->with('info','Updated Successfully');

}



}
