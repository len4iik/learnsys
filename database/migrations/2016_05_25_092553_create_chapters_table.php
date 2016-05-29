<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field');
            $table->integer('chapter_nr');
            $table->string('chapter_name');
            $table->text('text');
            $table->text('assignment');
            $table->text('step_by_step');
            $table->text('html_correct');
            $table->text('css_correct');
            $table->text('js_correct');
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
        Schema::drop('chapters');
    }
}
