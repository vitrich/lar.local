<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->float('number')->unique(); // аналог FloatField с unique
            $table->unsignedBigInteger('teacher_id')->nullable(); // ForeignKey на teachers
            $table->text('description')->nullable();
            $table->string('color', 7)->default('#bd2e8d');
            $table->timestamps();

            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->nullOnDelete();

            $table->index('number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
