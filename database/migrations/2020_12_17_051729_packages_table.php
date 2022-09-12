<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->text('description')->nullable();
            $table->integer('max_storage_size');
            $table->integer('max_file_size')->nullable();
            $table->decimal('annual_price',8,2);
            $table->decimal('monthly_price',8,2);
            $table->integer('max_employees');
            $table->softDeletes();
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
        Schema::dropIfExists('packages');
    }
}
