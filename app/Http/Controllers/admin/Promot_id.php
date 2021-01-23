<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Promot_users;

class Promot_id extends Controller
{
    public function index(Request $request)
    {
        $data = Promot_users::all()->sortByDesc('updated_at');
        return view("admin.promot_id", ["data" => $data]);
    }
    public function store(Request $request)
    {
        // validation user id 
        $validated = $request->validate([
            'user_id' => 'required',
            'watch_time' => 'required'
        ]);

        $cpi = Promot_users::where('user_id', $request->input('user_id'))->update([
            'watch_time' => $request->input('watch_time'),
            'permission' => 1
        ]);
        if ($cpi) {
            return back()->with("create_msg", "Permission Granted");
        } else {
            return back()->with("invaild_msg", "Invaild User ID");
        }
    }
    public function deny(Request $request)
    {
        $cpi = Promot_users::where('user_id', $request->input('user_id_for_deny'))->update([
            'permission' => 0
        ]);

        return back()->with("invaild_msg", "Permission Deny");
    }
    public function alldeny(Request $request)
    {
        $cpi = Promot_users::where('permission', '1')->update([
            'permission' => 0
        ]);

        return back()->with("invaild_msg", "Permission All Deny");
    }
}
