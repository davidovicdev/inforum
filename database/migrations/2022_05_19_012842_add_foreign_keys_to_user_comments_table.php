<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_comments', function (Blueprint $table) {
            $table->foreign(['comment_id'], 'fk_user_comments_comments1')->references(['id'])->on('comments')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'fk_user_comments_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_comments', function (Blueprint $table) {
            $table->dropForeign('fk_user_comments_comments1');
            $table->dropForeign('fk_user_comments_users1');
        });
    }
}
