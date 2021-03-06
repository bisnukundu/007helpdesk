<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoStatusTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'video_status', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'user_id' );
            $table->string( 'video_id' );
            $table->integer( "isComplate" )->default( 0 );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'video_status' );
    }
}
