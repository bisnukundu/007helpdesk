<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use APP\Models\Create_promot_id;

class Promot_id extends Controller
{
    public function index(Request $request)
    {
        $data = DB::select('select * from promot_id order by id desc');
        return view("admin.promot_id", ["data" => $data]);
    }
    public function store(Request $request)
    {
        $promot_id = $request->input('promot_id');
        $watch_time = $request->input('watch_time');
        // validation user id 
        $validated = $request->validate([
            'promot_id' => 'required',
            'watch_time' => 'required'
        ]);
        // user id data
        $user_id = $request->input("promot_id");
        // create user id query 
        DB::insert('insert into promot_id (promot_id,watch_time) values (?,?)', [$user_id, $watch_time]);
        return back()->with("create_msg", "Promot ID Create Successfully");
    }
    public function delete(Request $request, $id)
    {
        DB::delete("delete from promot_id where id= ?", [$id]);
        return back()->with('delete_msg', "Delete Successfully");
    }
}
