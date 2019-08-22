<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('companyName');
            $table->string('companyType')->nullable(); // EST. vs Co
            $table->string('companyCR')->nullable(); // رقم السجل التجاري
            $table->string('companyMainProducts')->nullable(); // to be selected from a dropdown list
            $table->string('companyEstablishmentYear')->nullable();
            $table->string('companyTotalEmployees')->nullable(); // for stats
            $table->string('companyBusinessType')->nullable(); // which industry the company is on
            $table->string('companyBio')->nullable();
            // logo
            $table->string('companyLogo')->nullable();
            // company contact details
            $table->string('companyTelephone')->nullable();
            $table->string('companyFax')->nullable();
            $table->string('companyEmail')->nullable();
            $table->string('companyWebsite')->nullable();
            $table->string('companyPObox')->nullable();
            $table->string('companyCountry')->nullable();
            $table->string('companyCity')->nullable();
            $table->string('companyAddress')->nullable();
            $table->string('companyLocation')->nullable();
            // foreign keys to be here


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
        Schema::dropIfExists('companies');
    }
}
