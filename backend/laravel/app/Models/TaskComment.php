<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TaskComment
 * @package App\Models
 * @property-read int $id
 * @property-read string $createdAt
 * @property-read string $updatedAt
 * @property-read string|null $deletedAt
 * @property int $taskId
 * @property string $text
 */
class TaskComment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
    ];
}
