<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
   {

    $superAdminRole = Role::where('name','superadmin')->first();
    $adminRole = Role::where('name','admin')->first();

    $data['admins'] = User::whereIn('role_id', [$superAdminRole->id , $adminRole->id])
    ->orderBy('id','desc')->paginate(10);



    return view('admin.admins.index')->with($data);

   }


   public function create()
   {
    return view('admin.admins.create');
   }

   public function store(Request $request)
   {
    $request->validate([
        'name' =>'required|string',
        'email' =>'required|email',
        'password' => 'required|string',
    ]);

 User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'role_id' => 2,

 ]);

    return redirect("dashboard/admins");
}

}
