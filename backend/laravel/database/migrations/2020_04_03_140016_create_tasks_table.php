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
            $table->timestampTz('done_at')->index()->nullable();
            $table->timestampTz('scheduled_at')->index();
            $table->timestampTz('notify_at')->nullable();
            $table->time('expected_time')->nullable();
            $table->string('text', 60);

            $table->unsignedBigInteger('parent_task_id')->index()->nullable();
            $table->foreign('parent_task_id')->references('id')->on('tasks');

            $table->unsignedBigInteger('user_id')->index();
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
