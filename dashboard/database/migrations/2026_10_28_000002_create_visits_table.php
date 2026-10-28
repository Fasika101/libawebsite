<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('visits')) {
            return;
        }

        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 45)->index();
            $table->string('country_code', 2)->nullable();
            $table->string('country_name', 100)->nullable();
            $table->string('page', 255);
            $table->string('site', 20)->default('main')->index();
            $table->dateTime('created_at')->nullable()->index();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
