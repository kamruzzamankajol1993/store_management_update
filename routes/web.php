<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SystemInformationController;
use App\Http\Controllers\Backend\Auth\LoginController;
//use App\Http\Controllers\Backend\Auth\ForgetPasswordController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\InvoicesettingController;
use App\Http\Controllers\Admin\CreditnotesController;
use App\Http\Controllers\Admin\EstimateController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SellController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\RequisitionController;
use App\Http\Controllers\Admin\RequestproductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.auth.login');
});

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('request_product_information_create', [RequestproductController::class, 'create'])->name('admin.request_product_information.create');
    Route::get('request_product_information_edit/{id}', [RequestproductController::class, 'edit'])->name('admin.request_product_information.edit');
    Route::get('request_product_information_view/{id}', [RequestproductController::class, 'view'])->name('admin.request_product_information.view');

    Route::get('request_product_information_print/{id}', [RequestproductController::class, 'print'])->name('admin.request_product_information.print');


    Route::get('request_product_information', [RequestproductController::class, 'index'])->name('admin.request_product_information');
    Route::post('request_product_information/store', [RequestproductController::class, 'store'])->name('admin.request_product_information.store');
    Route::post('request_product_information/update', [RequestproductController::class, 'update'])->name('admin.request_product_information.update');
    Route::post('request_product_information/delete/{id}', [RequestproductController::class, 'delete'])->name('admin.request_product_information.delete');





    Route::get('requisition_information_create', [RequisitionController::class, 'create'])->name('admin.requisition_information.create');
    Route::get('requisition_information_edit/{id}', [RequisitionController::class, 'edit'])->name('admin.requisition_information.edit');
    Route::get('requisition_information_view/{id}', [RequisitionController::class, 'view'])->name('admin.requisition_information.view');

    Route::get('requisition_information_print/{id}', [RequisitionController::class, 'print'])->name('admin.requisition_information.print');


    Route::get('requisition_information', [RequisitionController::class, 'index'])->name('admin.requisition_information');
    Route::post('requisition_information/store', [RequisitionController::class, 'store'])->name('admin.requisition_information.store');
    Route::post('requisition_information/update', [RequisitionController::class, 'update'])->name('admin.requisition_information.update');


    Route::post('status_requisition_information/update', [RequisitionController::class, 'status_requisition_information'])->name('admin.status_requisition_information.update');



    Route::post('requisition_information/delete/{id}', [RequisitionController::class, 'delete'])->name('admin.requisition_information.delete');





    Route::get('inventory_information_create', [PurchaseController::class, 'create'])->name('admin.inventory_information.create');
Route::get('inventory_information_edit/{id}', [PurchaseController::class, 'edit'])->name('admin.inventory_information.edit');
Route::get('inventory_information_view/{id}', [PurchaseController::class, 'view'])->name('admin.inventory_information.view');

Route::get('inventory_information_print/{id}', [PurchaseController::class, 'print'])->name('admin.inventory_information.print');


Route::get('inventory_information', [PurchaseController::class, 'index'])->name('admin.inventory_information');
Route::post('inventory_information/store', [PurchaseController::class, 'store'])->name('admin.inventory_information.store');
Route::post('inventory_information/update', [PurchaseController::class, 'update'])->name('admin.inventory_information.update');
Route::post('inventory_information/delete/{id}', [PurchaseController::class, 'delete'])->name('admin.inventory_information.delete');




    //unit

    Route::get('sell_information_price', [SellController::class, 'sell_information_price'])->name('sell_information_price');
    Route::get('sell_information_tax', [SellController::class, 'sell_information_tax'])->name('sell_information_tax');
    Route::get('sell_information_after_tax_price', [SellController::class, 'sell_information_after_tax_price'])->name('sell_information_after_tax_price');



Route::get('sell_information_create', [SellController::class, 'create'])->name('admin.sell_information.create');
Route::get('sell_information_edit/{id}', [SellController::class, 'edit'])->name('admin.sell_information.edit');
Route::get('sell_information_view/{id}', [SellController::class, 'view'])->name('admin.sell_information.view');

Route::get('sell_information_print/{id}', [SellController::class, 'print'])->name('admin.sell_information.print');


Route::get('sell_information', [SellController::class, 'index'])->name('admin.sell_information');
Route::post('sell_information/store', [SellController::class, 'store'])->name('admin.sell_information.store');
Route::post('sell_information/update', [SellController::class, 'update'])->name('admin.sell_information.update');
Route::post('sell_information/delete/{id}', [SellController::class, 'delete'])->name('admin.sell_information.delete');
//unit



//brand
    Route::get('rack_information_view/{id}', [BrandController::class, 'view'])->name('admin.rack_information.view');
    Route::get('rack_information', [BrandController::class, 'index'])->name('admin.rack_information');
    Route::post('rack_information/store', [BrandController::class, 'store'])->name('admin.rack_information.store');
    Route::post('rack_information/update', [BrandController::class, 'update'])->name('admin.rack_information.update');
    Route::post('rack_information/delete/{id}', [BrandController::class, 'delete'])->name('admin.rack_information.delete');
//brand



//caregory

Route::get('category_information_export', [CategoryController::class, 'category_information_export'])->name('category_information_export');



Route::get('category_information_view/{id}', [CategoryController::class, 'view'])->name('admin.category_information.view');
Route::get('category_information', [CategoryController::class, 'index'])->name('admin.category_information');
Route::post('category_information/store', [CategoryController::class, 'store'])->name('admin.category_information.store');
Route::post('category_information/update', [CategoryController::class, 'update'])->name('admin.category_information.update');
Route::post('category_information/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category_information.delete');
//categoey



//subcategory

Route::get('get_subcat_from_cat', [SubcategoryController::class, 'get_subcat_from_cat'])->name('get_subcat_from_cat');



Route::get('sub_category_information_view/{id}', [SubcategoryController::class, 'view'])->name('admin.sub_category_information.view');
Route::get('sub_category_information', [SubcategoryController::class, 'index'])->name('admin.sub_category_information');
Route::post('sub_category_information/store', [SubcategoryController::class, 'store'])->name('admin.sub_category_information.store');
Route::post('sub_category_information/update', [SubcategoryController::class, 'update'])->name('admin.sub_category_information.update');
Route::post('sub_category_information/delete/{id}', [SubcategoryController::class, 'delete'])->name('admin.sub_category_information.delete');
//subcategory


//unit
Route::get('unit_information_view/{id}', [UnitController::class, 'view'])->name('admin.unit_information.view');
Route::get('unit_information', [UnitController::class, 'index'])->name('admin.unit_information');
Route::post('unit_information/store', [UnitController::class, 'store'])->name('admin.unit_information.store');
Route::post('unit_information/update', [UnitController::class, 'update'])->name('admin.unit_information.update');
Route::post('unit_information/delete/{id}', [UnitController::class, 'delete'])->name('admin.unit_information.delete');
//unit


//warehouse
Route::get('warehouse_information_view/{id}', [WarehouseController::class, 'view'])->name('admin.warehouse_information.view');
Route::get('warehouse_information', [WarehouseController::class, 'index'])->name('admin.warehouse_information');
Route::post('warehouse_information/store', [WarehouseController::class, 'store'])->name('admin.warehouse_information.store');
Route::post('warehouse_information/update', [WarehouseController::class, 'update'])->name('admin.warehouse_information.update');
Route::post('warehouse_information/delete/{id}', [WarehouseController::class, 'delete'])->name('admin.warehouse_information.delete');
//warehouse


//product
//unit
Route::get('product_information_create', [ProductController::class, 'create'])->name('admin.product_information.create');
Route::get('product_information_edit/{id}', [ProductController::class, 'edit'])->name('admin.product_information.edit');
Route::get('product_information_view/{id}', [ProductController::class, 'view'])->name('admin.product_information.view');
Route::get('product_information', [ProductController::class, 'index'])->name('admin.product_information');
Route::post('product_information/store', [ProductController::class, 'store'])->name('admin.product_information.store');
Route::post('product_information/update', [ProductController::class, 'update'])->name('admin.product_information.update');
Route::post('product_information/delete/{id}', [ProductController::class, 'delete'])->name('admin.product_information.delete');
//unit

//product





    //client
    Route::get('supplier_information_view/{id}', [ClientController::class, 'view'])->name('admin.supplier_information.view');
    Route::get('supplier_information', [ClientController::class, 'index'])->name('admin.supplier_information');
    Route::post('supplier_information/store', [ClientController::class, 'store'])->name('admin.supplier_information.store');
    Route::post('supplier_information/update', [ClientController::class, 'update'])->name('admin.supplier_information.update');
    Route::post('supplier_information/delete/{id}', [ClientController::class, 'delete'])->name('admin.supplier_information.delete');

    //client



    ///vendor
    Route::get('vendor_information_view/{id}', [VendorController::class, 'view'])->name('admin.vendor_information.view');
    Route::get('vendor_information', [VendorController::class, 'index'])->name('admin.vendor_information');
    Route::post('vendor_information/store', [VendorController::class, 'store'])->name('admin.vendor_information.store');
    Route::post('vendor_information/update', [VendorController::class, 'update'])->name('admin.vendor_information.update');
    Route::post('vendor_information/delete/{id}', [VendorController::class, 'delete'])->name('admin.vendor_information.delete');
    //vendor


    //estimate


    Route::get('estimate_information', [EstimateController::class, 'index'])->name('admin.estimate_information');
    Route::post('estimate_information/store', [EstimateController::class, 'store'])->name('admin.estimate_information.store');
    Route::post('estimate_information/update', [EstimateController::class, 'update'])->name('admin.estimate_information.update');
    Route::post('estimate_information/delete/{id}', [EstimateController::class, 'delete'])->name('admin.estimate_information.delete');


    //end estimate


    //creit note


    Route::get('credit_notes_information', [CreditnotesController::class, 'index'])->name('admin.credit_notes_information');
    Route::post('credit_notes_information/store', [CreditnotesController::class, 'store'])->name('admin.credit_notes_information.store');
    Route::post('credit_notes_information/update', [CreditnotesController::class, 'update'])->name('admin.credit_notes_information.update');
    Route::post('credit_notes_information/delete/{id}', [CreditnotesController::class, 'delete'])->name('admin.credit_notes_information.delete');


    //end credit note


    //invoice setting


    Route::get('invoice_setting_information', [InvoicesettingController::class, 'index'])->name('admin.invoice_setting_information');
    Route::post('invoice_setting_information/store', [InvoicesettingController::class, 'store'])->name('admin.invoice_setting_information.store');
    Route::post('invoice_setting_information/update', [InvoicesettingController::class, 'update'])->name('admin.invoice_setting_information.update');
    Route::post('invoice_setting_information/delete/{id}', [InvoicesettingController::class, 'delete'])->name('admin.invoice_setting_information.delete');


    //end invoice setting


    //general

    Route::get('general_information', [GeneralController::class, 'index'])->name('admin.general_information');
    Route::post('general_information/store', [GeneralController::class, 'store'])->name('admin.general_information.store');
    Route::post('general_information/update', [GeneralController::class, 'update'])->name('admin.general_information.update');
    Route::post('general_information/delete/{id}', [GeneralController::class, 'delete'])->name('admin.general_information.delete');

    //end general


    //tax

    Route::get('tax_information', [TaxController::class, 'index'])->name('admin.tax_information');
    Route::post('tax_information/store', [TaxController::class, 'store'])->name('admin.tax_information.store');
    Route::post('tax_information/update', [TaxController::class, 'update'])->name('admin.tax_information.update');
    Route::post('tax_information/delete/{id}', [TaxController::class, 'delete'])->name('admin.tax_information.delete');

    //end tax


    //currency

    Route::get('currency_information', [CurrencyController::class, 'index'])->name('admin.currency_information');
    Route::post('currency_information/store', [CurrencyController::class, 'store'])->name('admin.currency_information.store');
    Route::post('currency_information/update', [CurrencyController::class, 'update'])->name('admin.currency_information.update');
    Route::post('currency_information/delete/{id}', [CurrencyController::class, 'delete'])->name('admin.currency_information.delete');

    //end currency


    Route::get('system_information', [SystemInformationController::class, 'index'])->name('admin.system_information');
    Route::post('system_information/store', [SystemInformationController::class, 'store'])->name('admin.system_information.store');
    Route::post('system_information/update', [SystemInformationController::class, 'update'])->name('admin.system_information.update');
    Route::post('system_information/delete/{id}', [SystemInformationController::class, 'delete'])->name('admin.system_information.delete');

    Route::get('roles', [RolesController::class, 'index'])->name('admin.roles');
    Route::get('roles/create', [RolesController::class, 'create'])->name('admin.roles.create');
    Route::post('roles/store', [RolesController::class, 'store'])->name('admin.roles.store');
    Route::get('roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
    Route::post('roles/update', [RolesController::class, 'update'])->name('admin.roles.update');

    Route::delete('roles/delete/{id}', [RolesController::class, 'delete'])->name('admin.roles.delete');


    Route::get('users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('users/create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::post('users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::delete('users/delete/{id}', [UsersController::class, 'delete'])->name('admin.users.delete');


    Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('permission/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::get('permission/view/{gname}', [PermissionController::class, 'view'])->name('admin.permission.view');
    Route::post('permission/update', [PermissionController::class, 'update'])->name('admin.permission.update');

    Route::delete('permission/delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete');



    Route::get('admins/view/{id}', [AdminsController::class, 'view'])->name('admin.admins.view');




    Route::get('admins', [AdminsController::class, 'index'])->name('admin.admins');
    Route::get('admins/create', [AdminsController::class, 'create'])->name('admin.admins.create');
    Route::post('admins/store', [AdminsController::class, 'store'])->name('admin.admins.store');
    Route::get('admins/edit/{id}', [AdminsController::class, 'edit'])->name('admin.admins.edit');
    Route::post('admins/update', [AdminsController::class, 'update'])->name('admin.admins.update');
    Route::delete('admins/delete/{id}', [AdminsController::class, 'delete'])->name('admin.admins.delete');


    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::post('password/update',[ProfileController::class, 'updatePassword'])->name('admin.password.update');



    Route::get('settings',[ProfileController::class, 'setting'])->name('admin.settings');
    Route::get('view_profile',[ProfileController::class, 'profile_view'])->name('admin.profile_view');







    // Login Routes
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login/submit',[LoginController::class,'login'])->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout.submit');

    Route::get('/recovery_password',[SessionController::class,'recovery_password'])->name('admin.recovery_password');

    Route::get('/logout_session',[SessionController::class,'logout_session'])->name('admin.logout_session');
    Route::get('/lock_screen/{email}',[SessionController::class,'lock_screen'])->name('admin.lock_screen');
    Route::post('/login_from_session',[SessionController::class,'login_from_session'])->name('admin.login_from_session');
    // Forget Password Routes

    Route::get('/check_mail_from_list',[ForgetPasswordController::class,'check_mail_from_list'])->name('check_mail_from_list');
    Route::post('/send_mail_get_from_list',[ForgetPasswordController::class,'send_mail_get_from_list'])->name('send_mail_get_from_list');
    Route::get('/password_reset_page/{id}',[ForgetPasswordController::class,'password_reset_page'])->name('password_reset_page');
    Route::get('/successfully_mail_send/{id}',[ForgetPasswordController::class,'successfully_mail_send'])->name('successfully_mail_send');

    Route::post('/password_change_confirmed',[ForgetPasswordController::class,'password_change_confirmed'])->name('password_change_confirmed');

    Route::get('/password/reset',[ForgetPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');

});
