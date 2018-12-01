<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoryPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('story_id');
            $table->string('indicator');
            $table->unsignedInteger('story_part_version_id')->nullable();
            $table->unsignedInteger('parent_story_part_id')->nullable();
            $table->unsignedInteger('title_story_part_id')->nullable();
            $table->unsignedTinyInteger('display_order')->default(1);
            $table->unsignedTinyInteger('publish')->default(1);
            $table->timestamps();
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
        Schema::dropIfExists('story_parts');
    }
}
