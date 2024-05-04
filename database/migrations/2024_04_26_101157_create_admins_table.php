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
        Schema::table('admins', function (Blueprint $table) {
            $table->integer('id')->default(DB::raw('(SELECT IFNULL(MAX(column_name), 0) + 1 FROM id)'));
        });
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nim_admin')->primary();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('password');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
