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
            $table->string('city', 100)->nullable()->after('role');
            $table->integer('height')->nullable()->after('city'); // см
            $table->float('weight', 8, 3)->nullable()->after('height'); // кг
            $table->text('description')->nullable()->after('weight');
            $table->softDeletes();
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
            $table->dropColumn('city');
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('description');
            $table->dropSoftDeletes();
        });
    }
};
