<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('name');
            $table->date('birthday')->nullable()->after('email');
            $table->text('bio')->nullable()->after('birthday');
            $table->string('avatar')->nullable()->after('bio');
            $table->boolean('is_admin')->default(false)->after('avatar');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'birthday', 'bio', 'avatar', 'is_admin']);
        });
    }
};
