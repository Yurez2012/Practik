<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikenewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW `blog`.`news_wit_likes` AS
            SELECT
              news.id,
              news.title,
              news.text,
              news.show,
              news.`category`,
              news.img,
              news.date_to_add,
              likes.like_class,
              COUNT(likes.id) AS `liked`
            FROM
              news
              LEFT JOIN likes
                ON news.id = likes.`news_id`
            GROUP BY news.id, likes.like_class
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS news_wit_likes');
    }
}
