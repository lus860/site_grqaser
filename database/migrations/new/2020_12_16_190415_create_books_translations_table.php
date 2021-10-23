<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();

            $table->unsignedBigInteger('book_id');
            $table->unique(['book_id', 'locale']);
            $table->foreign('book_id')->references('id')->on('book')->onDelete('cascade');

            $table->string('full_name');
            $table->mediumText('description');
            $table->longText('content');
            $table->string('seo_key')->nullable();
            $table->mediumText('seo_title')->nullable();
            $table->string('seo_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_translations');
    }
}
