<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PromotUsers extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'promot_user', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'user_id' );
            $table->string( 'name' )->nullable();
            $table->string( 'email' )->nullable();
            $table->string( 'phone' )->nullable();
            $table->string( 'password' )->nullable();
            $table->string( 'channel_name' )->nullable();
            // new
            $table->string( "promot_id" )->nullable();
            $table->string( "watch_time" )->nullable();
            $table->string( "video_id" )->nullable();
            $table->integer( "done_status" )->nullable();
            $table->integer( "permission" )->default( 0 );
            $table->timestamps();
        } );
        // Schema::create( 'promot_user', function ( Blueprint $table ) {
        //     $table->id();
        //     $table->string('video_id');
        //     $table->unsignedInteger( 'user' );
        //     $table->integer('complate')->default(0);
        //     $table->timestamps();
        //     $table->foreign( 'user' )->references( 'user_id' )->on( 'promot_user' )->onDelete('cascade');
        // } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'promot_user' );
    }
}
