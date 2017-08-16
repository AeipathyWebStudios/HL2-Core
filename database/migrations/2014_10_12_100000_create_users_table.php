<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->increments('id');
			$table->string('name');
			$table->string('avatar_url');
			$table->string('character_first');
			$table->string('character_last');
			$table->string('character_class');
			$table->integer('permission_level');
			$table->integer('level');
			$table->integer('money');
			$table->integer('strength');
			$table->integer('intelligence');
			$table->integer('agility');
			$table->integer('luck');
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken();
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
         Schema::dropIfExists('users');
    }
}
