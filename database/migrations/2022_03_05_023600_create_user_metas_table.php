<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")
                ->constrained("users")
                ->onDelete("CASCADE");
            $table->foreignId("province_id")
                ->constrained("provinces")
                ->onDelete("CASCADE");
            $table->foreignId("district_id")
                ->constrained("districts")
                ->onDelete("CASCADE");
            $table->foreignId("city_id")
                ->constrained("cities")
                ->onDelete("CASCADE");
            $table->string("locality", 100);
            $table->enum("is_eligible", ["1", "0"])
                ->default("1");
            $table->enum("show_mobile_number", ["1", "0"])
                ->default("0");
            $table->enum("can_make_phone_call", ["1", "0"])
                ->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_metas');
    }
};
