<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekTrackingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_tracking_models', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('mygoal_id');
            $table->integer('focused_goal_id');
            $table->integer('week');
            $table->integer('weekwise_amount')->nullable();
            $table->text('weekwise_note')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('week_tracking_models');
    }
}
