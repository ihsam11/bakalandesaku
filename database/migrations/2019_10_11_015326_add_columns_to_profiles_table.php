<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('kk_id');            
            $table->enum('sex', [ 'male', 'female' ]);                        
            $table->smallInteger('rt');            
            $table->smallInteger('rw');            
            $table->string('education');            
            $table->enum('citizenship', [ 'WNI', 'WNA' ]);            
            $table->unsignedBigInteger('kinship');            
            $table->string('father_name')->nullable();            
            $table->string('mother_name')->nullable();            
            $table->string('photo')->nullable();            
            $table->enum('status', [ 'active', 'inactive' ]);                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
            $table->dropColumn('kk_id');            
            $table->dropColumn('sex');                        
            $table->dropColumn('rt');            
            $table->dropColumn('rw');            
            $table->dropColumn('education');            
            $table->dropColumn('citizenship');            
            $table->dropColumn('kinship');            
            $table->dropColumn('father_name');            
            $table->dropCOlumn('mother_name');            
            $table->dropColumn('photo');            
            $table->dropColumn('status');                        
        });
    }
}
