<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddMoreFieldsToEbookTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebook_translations', function (Blueprint $table) {
            $table->text('key_word')->nullable()->after('publisher');
            $table->text('target_reader')->nullable()->after('key_word');
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ebook_translations', function (Blueprint $table) {
            $table->dropColumn('key_word');
            $table->dropColumn('target_reader');
        });
    }
}
