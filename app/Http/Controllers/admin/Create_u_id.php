<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Promot_users;

class Create_u_id extends Controller
{
    public function index(Request $request)
    {
        $data = Promot_users::paginate(10);
        return view("admin.create_u_id", ['data' => $data]);
    }
    public function search(Request $request)
    {
        $data = Promot_users::where('user_id', $request->input('search_user'))->get();
        return view("admin.create_u_id", ['data' => $data]);
    }
    public function store(Request $request)
    {
        // validation user id 
        $validated = $request->validate([
            'user_id' => ['required', 'unique:promot_user']
        ]);
        // create user id query 
        Promot_users::create([
            'user_id' => $request->input("user_id")
        ]);
        return back()->with("create_msg", "User ID Create Successfully");
    }
    public function delete($id)
    {
        $data = Promot_users::find($id)->first();
        $data->delete();
        return back()->with('delete_msg', "Delete Successfully");
    }
}
