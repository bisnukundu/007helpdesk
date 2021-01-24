<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Promot_users;
use Illuminate\Http\Request;

class Create_u_id extends Controller {
    public function index( Request $request ) {
        $data = Promot_users::paginate( 10 );
        return view( "admin.create_u_id", ['data' => $data] );
    }
    public function search( Request $request ) {
        $data = Promot_users::where( 'user_id', $request->input( 'search_user' ) )->get();
        return view( "admin.create_u_id", ['data' => $data] );
    }
    public function store( Request $request ) {
        // validation user id
        $validated = $request->validate( [
            'user_id' => ['required', 'unique:promot_user'],
        ] );
        // create user id query
        Promot_users::create( [
            'user_id' => $request->input( "user_id" ),
        ] );
        return back()->with( "create_msg", "User ID Create Successfully" );
    }
    public function delete( $id ) {
        $data = Promot_users::find( $id )->first();
        $data->delete();
        return back()->with( 'delete_msg', "Delete Successfully" );
    }
    public function userRegisterForm() {
        return view( "user.UserSingup" );
    }
    public function userRegister( Request $request ) {
        $user_id = $request->input( 'user_id' );
        $name = $request->input( 'name' );
        $channel_name = $request->input( 'channel_name' );
        $phone = $request->input( 'phone' );
        $email = $request->input( 'email' );
        $password = $request->input( 'password' );
        $resgister = Promot_users::where( 'user_id', $user_id )->update( [
            'name'         => $name,
            'email'        => $email,
            'phone'        => $phone,
            'password'     => $password,
            'channel_name' => $channel_name,
        ] );
        if ( $resgister ) {
            return back()->with( "success_msg", "Resgister Successfully" );
        } else {
            return back()->with( "faild_msg", "Resgister Faild" );
        }
    }
    public function userLoginForm() {
        return view( "user.userLogin" );
    }
    public function UserLogin( Request $request ) {
        $user_id = $request->input( 'user_id' );
        $password = $request->input( 'password' );
        $userLogin = Promot_users::where( [
            ['user_id', $user_id],
            ['password', $password],
        ] )->get()->count();

        if ( $userLogin == 1 ) {
            session( [
                'user_id'  => $user_id,
                'password' => $password,
            ] );
            return redirect( '/today_promote' );
        } else {
            return back()->with( "fail_msg", "User ID & Password Wrong" );
        }
    }
    public function userLogout() {
        session( [
            'user_id'  => null,
            'password' => null,
        ] );
        return redirect( '/' );
    }

}
