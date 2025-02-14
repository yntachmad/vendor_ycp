<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_clasifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clasification_id')->nullable()->constrained('clasifications')->onDelete('set null');
            $table->string('clasification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_clasifications');
    }
};
