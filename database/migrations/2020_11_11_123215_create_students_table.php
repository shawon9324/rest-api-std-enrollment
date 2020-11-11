<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->integer('section_id');
            $table->string('name');  
            $table->string('gender');  
            $table->string('phone');  
            $table->string('email');  
            $table->string('address');  
            $table->string('photo')->nullable();  
            $table->string('password');  
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
