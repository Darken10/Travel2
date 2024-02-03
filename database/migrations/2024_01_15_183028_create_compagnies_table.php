<?php

use App\Models\User;
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
        Schema::create('compagnies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sigle');
            $table->string('logoUrl')->nullable();
            $table->string('slogant')->nullable();
            $table->string('description')->nullable();
            $table->string('code')->unique();
            //$table->unsignedBigInteger('patron_id');
            $table->foreignId('patron')->references('user_id')->on('users')->nullable()->constrained()->nullOnDelete();
            //$table->foreignIdFor(User::class,'patron')->nullable()->constrained()->nullOnDelete();
            $table->boolean('isActive')->default(False);
            $table->string('statut')->default('valide');
            $table->integer('note')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compagnies');
    }
};
