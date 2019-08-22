<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quotationNumber');
            $table->date('quotationDate');
            $table->date('quotationExpiryDate');
            $table->string('quotationStatus'); // draft, sent, expired, declined, accepted
            $table->longText('quotationNotes');
            $table->longText('quotationTerms');
            // more to be here

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
        Schema::dropIfExists('quotations');
    }
}
