<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Create_u_id extends Controller
{
    public function index(Request $request)
    {
        $data = DB::select('select * from promot_user');
        return view("admin.create_u_id", ['data' => $data]);
    }
    public function store(Request $request)
    {
        // validation user id 
        $validated = $request->validate([
            'user_id' => ['required', 'unique:promot_user']
        ]);

        // user id data
        $user_id = $request->input("user_id");
        // create user id query 
        DB::insert('insert into promot_user (user_id) values (?)', [$user_id]);
        return back()->with("create_msg", "User ID Create Successfully");
    }
    public function delete(Request $request, $id)
    {
        DB::delete("delete from promot_user where id= ?", [$id]);
        return back()->with('delete_msg', "Delete Successfully");
    }
}
