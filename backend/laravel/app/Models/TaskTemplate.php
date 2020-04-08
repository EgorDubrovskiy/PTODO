<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskTemplate
 * @package App\Models
 * @property-read int $id
 * @property-read string $created_at
 * @property-read string $updated_at
 * @property string $text
 * @property int|null $parent_task_id
 */
class TaskTemplate extends Model
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
