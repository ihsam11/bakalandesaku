<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('register_date');
            $table->string('nik', 16)->unique();
            $table->unsignedBigInteger('kk_id');                        
            $table->string('name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->unsignedBigInteger('blood_type');
            $table->string('address');
            $table->unsignedBigInteger('religion');
            $table->unsignedBigInteger('marriage')->nullable();
            $table->string('work');              
            $table->enum('gender', [ 'Laki-laki', 'Perempuan' ]);                        
            $table->smallInteger('rt');            
            $table->smallInteger('rw');            
            $table->unsignedBigInteger('education');            
            $table->string('citizenship');            
            $table->unsignedBigInteger('lineage');            
            $table->string('father_name')->nullable();            
            $table->string('mother_name')->nullable();            
            $table->string('photo_path')->nullable();            
            $table->boolean('status');             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
