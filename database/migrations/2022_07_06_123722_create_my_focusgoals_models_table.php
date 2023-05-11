<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyFocusgoalsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_focusgoals_models', function (Blueprint $table) {
            
            $table->id();
            $table->integer('mygoal_id');
            $table->integer('user_id');
            $table->string('focused_cat');            
            $table->string('each_month_goal');
            $table->string('archive_goal_time');
            $table->text('catwise_spend')->nullable();            
            $table->string('spend_think')->nullable();
            $table->string('earn_after_tax_per_mnth')->nullable();
            $table->string('per_mnth_amnt_to_achieve_goal')->nullable();
            $table->text('catwise_actual_spend')->nullable();
            $table->text('achieve_my_goal')->nullable();
            $table->text('weekly_saving')->nullable();
            $table->string('weekwise_track_goal')->nullable();
            $table->string('monthwise_track_goal')->nullable();
            $table->string('current_step')->nullable();
            $table->string('goal_status')->nullable();
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
        Schema::dropIfExists('my_focusgoals_models');
    }
}
