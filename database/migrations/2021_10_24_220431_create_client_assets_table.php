<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('maintenance_request_id');
            $table->string('issue');
            $table->double('cost')->default(0);
            $table->smallInteger('status')->default(0);
            $table->date('delivery_date');



            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('maintenance_request_id')->references('id')->on('maintenance_requests')->cascadeOnDelete();



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
        Schema::dropIfExists('client_assets');
    }
}
