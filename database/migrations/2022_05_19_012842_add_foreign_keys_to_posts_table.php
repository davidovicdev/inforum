<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign(['topic_id'], 'fk_posts_topics1')->references(['id'])->on('topics')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'fk_posts_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('fk_posts_topics1');
            $table->dropForeign('fk_posts_users1');
        });
    }
}
