<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('title_key')->nullable();
            $table->text('description_key')->nullable();
            $table->text('content_key')->nullable();
            $table->boolean('show_image')->default(1);
            $table->string('image', 64)->nullable();
            $table->boolean('show_in_header')->default(1);
            $table->boolean('show_in_footer')->default(1);
            $table->boolean('active')->default(1);
            $table->integer('sort')->unsigned()->default(0);
            $table->text('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
