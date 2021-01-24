<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->char('title','50');
            $table->text('body')->nullable();
            $table->integer('hour')->nullable();
            $table->integer('minutes')->nullable();
            $table->boolean('is_public')->default(true)->comment('公開・非公開');
            $table->dateTime('published_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('公開日');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
