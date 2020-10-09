<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->nullable();
            $table->integer('priority')->default(0)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('priority');
            $table->dropColumn('user_id');
        });
    }
}
