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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('invoice_number')->unique();

            $table->decimal('total_price', 12, 2)->default(0);

            $table->enum('payment_method', [
                'transfer',
                'qris',
                'cod'
            ]);

            $table->enum('order_status', [
                'baru',
                'diproses',
                'dikirim',
                'selesai',
                'batal'
            ])->default('baru');

            $table->enum('payment_status', [
                'belum_bayar',
                'lunas'
            ])->default('belum_bayar');

            $table->text('address')->nullable();

            $table->decimal('latitude', 10, 7)->nullable();

            $table->decimal('longitude', 10, 7)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
