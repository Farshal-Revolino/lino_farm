<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations (Menjalankan Perubahan).
     *
     * @return void
     */
    public function up()
    {
        // Ganti 'sapisapistock' menjadi 'sapi'
        Schema::table('sapi', function (Blueprint $table) { 
            // Tambahkan kolom 'sapistock' dengan nilai default 'ready'
            $table->enum('sapistock', ['ready', 'terjual'])->default('ready')->after('berat');
        });
    }

    /**
     * Reverse the migrations (Membatalkan Perubahan).
     *
     * @return void
     */
    public function down()
    {
        // Ganti 'sapisapistock' menjadi 'sapi'
        Schema::table('sapi', function (Blueprint $table) {
            // Hapus kolom 'sapistock'
            $table->dropColumn('sapistock');
        });
    }
};