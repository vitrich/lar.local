<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('group_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('group_id');
            $table->date('transfer_date');
            $table->text('reason')->nullable();
            $table->timestamps();

            $table->foreign('student_id')
                ->references('id')->on('students')
                ->cascadeOnDelete();

            $table->foreign('group_id')
                ->references('id')->on('groups')
                ->cascadeOnDelete();

            $table->index(['student_id', 'transfer_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('group_histories');
    }
};
