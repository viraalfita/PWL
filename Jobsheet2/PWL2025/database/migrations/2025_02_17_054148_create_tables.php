<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('m_kategori', function (Blueprint $table) {
            $table->id('kategori_id');
            $table->string('kategori_kode', 10)->unique();
            $table->string('kategori_nama', 100);
            $table->timestamps();
        });

        Schema::create('m_barang', function (Blueprint $table) {
            $table->id('barang_id');
            $table->foreignId('kategori_id')->constrained('m_kategori')->onDelete('cascade');
            $table->string('barang_kode', 10)->unique();
            $table->string('barang_nama', 100);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->timestamps();
        });

        Schema::create('m_level', function (Blueprint $table) {
            $table->id('level_id');
            $table->string('level_kode', 10)->unique();
            $table->string('level_nama', 100);
            $table->timestamps();
        });

        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->foreignId('level_id')->nullable()->constrained('m_level')->onDelete('set null');
            $table->string('username', 20)->unique();
            $table->string('nama', 100);
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id');
            $table->foreignId('barang_id')->constrained('m_barang')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('m_user')->onDelete('set null');
            $table->dateTime('stok_tanggal')->default(now());
            $table->integer('stok_jumlah');
            $table->timestamps();
        });

        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id('penjualan_id');
            $table->foreignId('user_id')->nullable()->constrained('m_user')->onDelete('set null');
            $table->string('pembeli', 50);
            $table->string('penjualan_kode', 20)->unique();
            $table->dateTime('penjualan_tanggal')->default(now());
            $table->timestamps();
        });

        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id('detail_id');
            $table->foreignId('penjualan_id')->constrained('t_penjualan')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('m_barang')->onDelete('cascade');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_penjualan_detail');
        Schema::dropIfExists('t_penjualan');
        Schema::dropIfExists('t_stok');
        Schema::dropIfExists('m_user');
        Schema::dropIfExists('m_level');
        Schema::dropIfExists('m_barang');
        Schema::dropIfExists('m_kategori');
    }
};
