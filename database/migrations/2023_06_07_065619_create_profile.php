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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('frst_name',50);
            $table->string('flast_name',50);
            $table->string('mobile',50);
            $table->string('city',50);
            $table->string('email',50)->unique();
            $table->string('shiping_adress',1000);

            //relation

            $table->foreign('email')
            ->references('email')->on('users')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
