<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();

            $table->unsignedBigInteger('author_id');
            $table->unique(['author_id', 'locale']);
            $table->foreign('author_id')->references('id')->on('author')->onDelete('cascade');

            $table->string('full_name');
            $table->string('seo_key')->nullable();
            $table->string('seo_title')->nullable();
            $table->mediumText('seo_description')->nullable();
            $table->longText('biography');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_translations');
    }
}
