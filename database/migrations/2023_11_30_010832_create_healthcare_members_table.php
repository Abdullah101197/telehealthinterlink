<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthcareMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthcare_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_email');
            $table->string('image')->default('defaultUser.png');
            $table->string('based_on');
            $table->timestamp('since');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('subscription_status')->default(0);
            $table->tinyInteger('is_filled')->default(0);
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('healthcare_members');
    }
}
