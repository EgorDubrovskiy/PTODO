<?php

namespace App\Models\Tasks;

/**
 * Class TaskTemplate
 * @package App\Models
 *
 * Database fields:
 * @property int $user_task_template_id
 */
class TaskTemplate extends BaseTask
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
    ];
}
