<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();       // clean URL: /news/headliners-announced
            $table->text('excerpt')->nullable();    // short preview shown on cards
            $table->longText('body');               // full article content
            $table->string('image')->nullable();    // path to image in storage/app/public
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable(); // set automatically when first published
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
