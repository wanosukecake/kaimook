<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFromToToGoals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goals', function (Blueprint $table) {
            $table->date('from')
                    ->nullable()
                    ->after('goal');
            $table->date('to')
                    ->nullable()
                    ->after('from');
            $table->unique('user_id');
        });
        Schema::table('reports', function (Blueprint $table) {
            $table->integer('added_progress')
                    ->length(3)
                    ->default(0)
                    ->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goals', function (Blueprint $table) {
            $table->dropColumn('from');
            $table->dropColumn('to');
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('added_progress');
        });
    }
}
