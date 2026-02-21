<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('student_id');

            $table->longText('tasks_data');      // JSON заданий
            $table->longText('answers')->nullable(); // JSON ответов
            $table->integer('score')->nullable();    // 0–7
            $table->integer('correct_count')->default(0);
            $table->integer('total_count')->default(10);
            $table->timestamp('submitted_at')->nullable();

            $table->timestamps();

            $table->foreign('lesson_id')
                ->references('id')->on('lessons')
                ->cascadeOnDelete();

            $table->foreign('student_id')
                ->references('id')->on('students')
                ->cascadeOnDelete();

            $table->unique(['lesson_id', 'student_id']); // unique_together
            $table->index('submitted_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_tasks');
    }
};
