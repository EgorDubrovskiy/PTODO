<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskComment
 * @package App\Models
 * @property-read int $id
 * @property-read string $created_at
 * @property-read string $updated_at
 * @property int $task_id
 * @property string $text
 */
class TaskComment extends Model
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
