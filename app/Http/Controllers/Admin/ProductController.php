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
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
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
        if (is_null($this->user) || !$this->user->can('product_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }
        $users = Product::all();
        $cat_list = Category::all();

        return view('backend.product.index', compact('users','cat_list'));
    }


    public function create()
    {
        if (is_null($this->user) || !$this->user->can('product_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }
        $vendor_list = Vendor::all();
        $cat_list = Category::all();
        $sub_cat_list = Subcategory::all();
        $brand_list = Brand::all();
        $tax_list = Tax::all();
        $unit_list = Unit::all();
        $warehouse_list = Warehouse::all();


        return view('backend.product.create', compact('vendor_list','cat_list','sub_cat_list','brand_list','tax_list','unit_list','warehouse_list'));
    }


    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('product_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }
        $vendor_list = Vendor::all();
        $cat_list = Category::all();
        $sub_cat_list = Subcategory::all();
        $brand_list = Brand::all();
        $tax_list = Tax::all();
        $unit_list = Unit::all();
        $warehouse_list = Warehouse::all();
$product_list = Product::where('id',$id)->first();

        return view('backend.product.edit', compact('vendor_list','product_list','cat_list','sub_cat_list','brand_list','tax_list','unit_list','warehouse_list'));
    }


    public function view($id)
    {
        if (is_null($this->user) || !$this->user->can('product_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }
        $cat_list = Category::all();
        $sub_cat_list = Subcategory::all();
        $brand_list = Brand::all();
        $tax_list = Tax::all();
        $unit_list = Unit::all();
        $warehouse_list = Warehouse::all();
        $product_list = Product::where('id',$id)->first();

        return view('backend.product.view', compact('product_list','cat_list','sub_cat_list','brand_list','tax_list','unit_list','warehouse_list'));
    }





    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('product_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }

        if($request->tax == 0){

            $price_with_tax = $request->selling_price;


        }else{
            $price_with_tax1 = ($request->selling_price*$request->tax)/100;

            $price_with_tax =  $price_with_tax1 + $request->selling_price;

        }






        // Create New User
        $admins = new Product();

        $admins->name = $request->name;
        $admins->category = $request->category;
        $admins->subcategory = $request->subcategory;
        $admins->brand = $request->brand;
        $admins->unit = $request->unit;
        $admins->unit_measure = $request->unit_measure;
        $admins->quantity = $request->quantity;
        $admins->stock_unit = $request->stock_unit;
        $admins->alert_quantity = $request->alert_quantity;
        $admins->ware_house = $request->ware_house;
        $admins->buying_price = $request->buying_price;
        $admins->price_with_tax = $price_with_tax;
        $admins->selling_price = $request->selling_price;
        $admins->whole_sale_price = $request->whole_sale_price;
        $admins->tax = $request->tax;
        $admins->sku = $request->sku;
        $admins->vendor = $request->vendor;
        $admins->des = $request->des;
        $admins->status = $request->status;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $admins->image =  'public/uploads/'.$filename;

        }



        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('product_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }


        if($request->tax == 0){

            $price_with_tax = $request->selling_price;


        }else{
            $price_with_tax1 = ($request->selling_price*$request->tax)/100;

            $price_with_tax =  $price_with_tax1 + $request->selling_price;

        }
        // Create New User
        $admins = Product::find($request->id);




        $admins->name = $request->name;
        $admins->category = $request->category;
        $admins->subcategory = $request->subcategory;
        $admins->brand = $request->brand;
        $admins->unit = $request->unit;
        $admins->unit_measure = $request->unit_measure;
        $admins->quantity = $request->quantity;
        $admins->stock_unit = $request->stock_unit;
        $admins->alert_quantity = $request->alert_quantity;
        $admins->ware_house = $request->ware_house;
        $admins->buying_price = $request->buying_price;
        $admins->selling_price = $request->selling_price;
        $admins->price_with_tax = $price_with_tax;
        $admins->whole_sale_price = $request->whole_sale_price;
        $admins->tax = $request->tax;
        $admins->sku = $request->sku;
        $admins->vendor = $request->vendor;
        $admins->des = $request->des;

        $admins->status = $request->status;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $admins->image =  'public/uploads/'.$filename;

        }

        $admins->save();




        return back()->with('info','Updated successfully!');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('product_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }
        $admins = Product::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
