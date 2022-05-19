<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('gender_id')->index('fk_users_gender1_idx');
            $table->integer('city_id')->nullable()->index('fk_users_cities1_idx');
            $table->integer('eye_color_id')->nullable()->index('fk_users_eye_color1_idx');
            $table->integer('interested_in_id')->nullable()->index('fk_users_interested_in1_idx');
            $table->integer('hair_color_id')->nullable()->index('fk_users_hair_color1_idx');
            $table->integer('profession_id')->nullable()->index('fk_users_professions1_idx');
            $table->integer('status_of_relationship_id')->nullable()->index('fk_users_status_of_relationship1_idx');
            $table->string('username', 45)->unique('username_UNIQUE');
            $table->string('email')->unique('email_UNIQUE');
            $table->string('password');
            $table->tinyInteger('is_admin');
            $table->tinyInteger('is_active');
            $table->text('avatar')->nullable();
            $table->text('about_me_description')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone', 45)->nullable()->unique('phone_UNIQUE');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
