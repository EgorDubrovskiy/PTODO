<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTasksTable
 */
class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->timestampTz('started_at')->nullable();
            $table->timestampTz('done_at')->nullable();
            $table->timestampTz('scheduled_at');
            $table->timestampTz('notify_at')->nullable();
            $table->time('expected_time')->nullable();
            $table->string('text', 8000);

            $table->unsignedBigInteger('prent_task_id')->nullable();
            $table->foreign('prent_task_id')->references('id')->on('tasks');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
