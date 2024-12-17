<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            //
            $table->decimal('jumlah_dana', 15, 2)->nullable();
            $table->date('tanggal_pemberian')->nullable();
            $table->enum('status_dana', ['belum_disalurkan', 'sudah_disalurkan'])->default('belum_disalurkan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropColumn(['jumlah_dana', 'tanggal_pemberian', 'status_dana']);
        });
    }
};
