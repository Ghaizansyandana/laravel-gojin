<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            if (!Schema::hasColumn('pembayarans', 'transaksi_id')) {
                $table->foreignId('transaksi_id')->after('id')->constrained()->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign(['transaksi_id']);
            $table->dropColumn('transaksi_id');
        });
    }

};
