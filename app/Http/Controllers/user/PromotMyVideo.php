<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Promot_users;
use App\Models\VideoStatu;
use Illuminate\Http\Request;

class PromotMyVideo extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( "user.PromotMyVideo" );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $validation = $request->validate( [
            'user_id'  => 'required',
            'video_id' => 'required',
        ] );

        $user_id = $request->input( 'user_id' );
        $video_id = $request->input( 'video_id' );
        $update = Promot_users::where( [
            ['user_id', $user_id],
            ['permission', 1],
        ] )->update( [
            'video_id' => $video_id,
        ] );
        if ( $update ) {
            return back()->with( 'suc_msg', 'Promot Successfully' );
        } else {
            return back()->with( 'fai_msg', 'Promot Faild Please Contact Us' );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function today_promot() {
        //Today Promote Video Details
        $data = Promot_users::where( 'permission', 1 )->get();
        return view( "user.TodayPromoteDetails", ['data' => $data] );
    }
    public function watch_promot() {
        $arr = [];
        $data = Promot_users::where( 'permission', 1 )->get('video_id')->toArray();
        $complated_video = VideoStatu::get(['user_id','video_id'])->toArray();
        

        return view( 'user.WatchPromotVideo', ['data' => $data, 'data2' => $complated_video] );
    }

    public function complate( Request $request ) {
        $video = $request->input( 'video' );
        $id = $request->input( 'id' );
        VideoStatu::insert( [
            'isComplate' => 1,
            'video_id'   => $video,
            'user_id'    => $id,
        ] );
        return back()->with('msg',"Complate Successfully");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //
    }
}
