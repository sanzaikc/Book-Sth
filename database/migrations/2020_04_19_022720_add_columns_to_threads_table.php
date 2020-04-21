<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->integer('vote_count')->default(0);
            $table->integer('reply_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->unsignedInteger('best_reply_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropColumn(['vote_count', 'reply_count', 'view_count','best_reply_id' ]);
        });
    }
}
