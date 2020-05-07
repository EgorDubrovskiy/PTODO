<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 * Class CreateTaskTemplatesTable
 */
class CreateTaskTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_templates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string('text', 60);

            $table->unsignedBigInteger('parent_task_id')->index()->nullable();
            $table->foreign('parent_task_id')->references('id')->on('task_templates');

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::statement('CREATE EXTENSION ltree');
        DB::statement('ALTER TABLE task_templates ADD COLUMN parent_path LTREE');
        DB::statement('CREATE INDEX task_templates_parent_path_index ON task_templates USING GIST (parent_path)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_templates');
        DB::statement('DROP EXTENSION ltree');
    }
}
