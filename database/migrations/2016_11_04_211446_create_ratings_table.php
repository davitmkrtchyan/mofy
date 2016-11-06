<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bookmaker');
            $table->string('rating');
            $table->string('logo');
            $table->text('review');
            $table->text('bonuses');
            $table->text('advantages');
            $table->text('languages');
            $table->text('depositmethods');
            $table->text('withdrawalmethods');
            $table->string('livebetting');
            $table->string('livestriming');
            $table->string('casino');
            $table->string('poker');
            $table->string('livechat');
            $table->string('liveemail');
            $table->string('telephone');
            $table->text('currencieslimits');
            $table->string('affiliatelink');
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
        Schema::drop('rating');
    }
}
