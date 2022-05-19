<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['city_id'], 'fk_users_cities1')->references(['id'])->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['eye_color_id'], 'fk_users_eye_color1')->references(['id'])->on('eye_color')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['gender_id'], 'fk_users_gender1')->references(['id'])->on('gender')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['hair_color_id'], 'fk_users_hair_color1')->references(['id'])->on('hair_color')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['interested_in_id'], 'fk_users_interested_in1')->references(['id'])->on('interested_in')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['profession_id'], 'fk_users_professions1')->references(['id'])->on('professions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['status_of_relationship_id'], 'fk_users_status_of_relationship1')->references(['id'])->on('status_of_relationship')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_cities1');
            $table->dropForeign('fk_users_eye_color1');
            $table->dropForeign('fk_users_gender1');
            $table->dropForeign('fk_users_hair_color1');
            $table->dropForeign('fk_users_interested_in1');
            $table->dropForeign('fk_users_professions1');
            $table->dropForeign('fk_users_status_of_relationship1');
        });
    }
}
