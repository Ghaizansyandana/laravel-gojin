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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->enum('jk', ['laki-laki', 'perempuan']);
            $table->enum('agama', [
                'Islam', 
                'hindu', 
                'katolik',
                'buddha', 
                'konghucu'
            ]);
            $table->text('alamat');
            $table->integer('tb');
            $table->integer('bb');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
