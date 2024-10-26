<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('smtp_servers', function (Blueprint $table) {
            $table->id();
            $table->string('transport')->default('smtp');
            $table->string('host');
            $table->integer('port');
            $table->string('encryption');
            $table->string('username');
            $table->string('password');
            $table->integer('timeout')->nullable();
            $table->boolean('auth_mode')->default(false);
            $table->boolean('active')->default(true);
            $table->boolean('default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smtp_servers');
    }
};
