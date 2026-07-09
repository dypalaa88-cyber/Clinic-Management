<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();

            // (1) name: اسم اللائحة (مثال: "أسعار نقدي 2026"، "أسعار التأمين")
            $table->string('name', 100);

            // (2) description: وصف اختياري
            $table->text('description')->nullable();

            // (3) is_active: هل اللائحة مفعّلة؟
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_lists');
    }
};