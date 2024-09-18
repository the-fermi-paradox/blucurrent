<?php
declare(strict_types=1);
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
        Schema::create('empires', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('release_id')->constrained();
            $table->string('architecture');
            $table->string('continent');
            $table->string('focus');
            $table->string('unique_units');
            $table->string('unique_technologies');
            $table->string('unique_buildings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empires');
    }
};
