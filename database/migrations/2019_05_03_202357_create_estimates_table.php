<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('uuid');
            $table->date('date');
            $table->date('expiryDate');
            $table->string('status'); // draft, sent, expired, declined, accepted
            $table->longText('notes');
            $table->longText('terms');
            // more to be here
            // foregn keys to be here
            $table->unsignedInteger('order_id'); // to know which order the estimate was created
            $table->unsignedInteger('company_id'); // for the company that created the estimate
            $table->unsignedInteger('user_id'); // for user that created the estimate
            $table->unsignedInteger('client_id'); // for user that created the estimate


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
        Schema::dropIfExists('estimates');
    }
}
