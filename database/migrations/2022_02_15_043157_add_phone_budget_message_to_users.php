<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->string( "phone" )->required()->after("email");
            $table->integer( "budget" )->required()->after("phone");
            $table->longText( "message" )->required()->after("budget");
            $table->string( "role" )->required()->after("message");
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->dropColumn( "phone" );
            $table->dropColumn( "budget" );
            $table->dropColumn( "message" );
            $table->dropColumn( "role" );
        } );
    }
};
