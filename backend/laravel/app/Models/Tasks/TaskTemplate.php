<?php

namespace App\Models;

/**
 * Class TaskTemplate
 * @package App\Models
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
