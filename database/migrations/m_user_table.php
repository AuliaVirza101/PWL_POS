<?php

use App\models\m_level;
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
        Schema::create('useri', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBIgInteger('level_id')->index();//indexing untuk foreignkey
            $table->String('username',20)->unique();
            $table->String('name',100);
            $table->String('password');
            $table->timestamps();

            //mendefinisikan foreign key pada kolom level id mengacu pada kolom level id di tabel m_level
            $table->foreign('level_id')->references('level_id')->on('m_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useri');
    }
};
