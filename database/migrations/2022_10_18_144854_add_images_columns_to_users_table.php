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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar', 100)->nullable()->after('weight');
            $table->string('hero_image', 100)->nullable()->after('avatar');
            $table->json('gallery_images')->nullable()->after('hero_image');
            $table->boolean('is_shown_on_welcome')->default(false)->after('gallery_images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('hero_image');
            $table->dropColumn('gallery_images');
            $table->dropColumn('is_shown_on_welcome');
        });
    }
};
