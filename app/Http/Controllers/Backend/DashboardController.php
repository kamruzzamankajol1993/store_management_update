<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Requisition;
use App\Models\Product;
class DashboardController extends Controller
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
if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            // abort(403, 'Sorry !! You are Unauthorized to view dashboard !');

            return redirect('/admin/logout_session');
        }


        $count_admin = Admin::where('id','!=',1)->count();
        $total_product = Product::count();
        if(Auth::guard('admin')->user()->id == 1){


        $total_re_product = Requisition::where('status','Accept')->count();
        $total_re_due_product = Requisition::where('status','Due')->count();

        $requisition_list = Requisition::where('status','Due')->latest()->get();
    }else{


        $total_re_product = Requisition::where('admin_id',Auth::guard('admin')->user()->id)->where('status','Accept')->count();
        $total_re_due_product = Requisition::where('admin_id',Auth::guard('admin')->user()->id)->where('status','Due')->count();

        $requisition_list = Requisition::where('admin_id',Auth::guard('admin')->user()->id)->where('status','Due')->latest()->get();



    }


    	return view('backend.index',compact('requisition_list','total_re_due_product','count_admin','total_product','total_re_product'));
    }
}
