<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminAuth.index');
    }
    public function fetchAdmins()
    {
        $admins = Admin::all();
        return response()->json([
            'data'  => $admins
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        
        if ($validator->fails()) {
            return response()->json([
                'status'  =>404,
                'errors' =>$validator->errors(),
            ]);
        } else {
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
             ]);
            return response()->json([
                'status'  =>200,
                'message' =>'Admin added Successfully.',
            ]);
        }
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        if ($admin === null) {
            return response()->json([
                'status'  =>404,
                'message' =>'admin not found',
            ]);
        } else {
            return response()->json([
                'status'  =>200,
                'admin'  => [
                    'id' => $admin->id,
                    'name' => $admin->name,
                    'email' => $admin->email,
                    'password' => $admin->password,
                ]
            ]);
        }
        
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        
        if ($validator->fails()) {
            return response()->json([
                'status'  =>404,
                'errors' =>$validator->errors(),
            ]);
        }
         else if($admin == null){
            return response()->json([
                'status'  =>400,
                'message' =>'Admin not found',
            ]);
         } else {
            $admin->update($request->all());
            return response()->json([
                'status'  =>200,
                'message' =>'Updated Successfully.',
            ]);
        }
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        if($admin === null){
            return response()->json([
                'status'  =>400,
                'message' =>'admin not found',
            ]);
         } else {
            $admin->delete();
            return response()->json([
                'status'  =>200,
                'message' =>'Deleted Successfully.',
            ]);
        }
    }

}
