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
        Schema::create('midwives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('midwife_name');
            $table->enum('midwife_gender', ['Laki-laki', 'Perempuan']);
            $table->date('midwife_brithday');
            $table->text('midwife_address');
            $table->string('midwife_specialization');
            $table->string('midwife_image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midwives');
    }
};
