<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('email');
            $table->text('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('sendblue_api')->nullable();
            $table->string('api_token')->nullable();
            $table->ulid('owner_id')->nullable();
            $table->string('slug')->nullable(); // Field name same as your `saveSlugsTo`
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
