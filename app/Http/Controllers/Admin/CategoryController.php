<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use File;
use Response;
class CategoryController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function category_information_export(){


        $data = [
            'users' => Category::all()->toArray(),

            //and the next model
         ];
         $data = json_encode($data);
               $fileName = time() . '_datafile.json';
               File::put(public_path('/uploads/jsonfile/'.$fileName),$data);
               return Response::download(public_path('/uploads/jsonfile/'.$fileName));


    }
     public function index()
    {
        if (is_null($this->user) || !$this->user->can('category_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any categoory !');
        }
        $users = Category::all();

        return view('backend.category.index', compact('users'));
    }





    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('category_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }


        // Create New User
        $admins = new Category();

        $admins->name = $request->name;


        $admins->save();




        return back()->with('success','Created successfully!');
    }


    public function update(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('category_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }
        // Create New User
        $admins = Category::find($request->id);




        $admins->name = $request->name;


        $admins->save();




        return back()->with('info','Updated successfully!');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('category_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }
        $admins = Category::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
