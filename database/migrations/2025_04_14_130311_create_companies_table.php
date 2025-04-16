<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("companies", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("head_fio");
            $table->string("location");
            $table->string("email")->unique();
            $table->string("website")->nullable();
            $table->string("phone_number");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("companies");
    }
};
