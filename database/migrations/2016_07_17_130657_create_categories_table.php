<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name')->nullable();
            $table->string('category_slug')->nullable();
            $table->string('fa_icon')->nullable();
            $table->string('icon_active');
            $table->string('type');
            $table->string('value_type');
            $table->string('description')->nullable();
            $table->enum('is_mandatory', ['Y','N'])->default('N');
            $table->enum('is_active', ['Y','N'])->default('Y');
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
        Schema::drop('categories');
    }
}
