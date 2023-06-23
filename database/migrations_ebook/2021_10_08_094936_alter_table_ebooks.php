<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEbooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('ebooks', function (Blueprint $table) {
            $table->string('book_edition')->nullable()->after('publication_year');
            $table->string('number_of_pages')->nullable()->after('book_edition');
            $table->string('book_language')->nullable()->after('number_of_pages');
            $table->string('country_origin')->nullable()->after('book_language');
        });
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('book_edition');
        $table->dropColumn('number_of_pages');
        $table->dropColumn('book_language');
        $table->dropColumn('country_origin');
    }
}
