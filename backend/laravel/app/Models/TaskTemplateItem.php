<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TaskTemplateItem
 * @package App\Models
 * @property-read int $id
 * @property-read string $createdAt
 * @property-read string $updatedAt
 * @property-read string|null $deletedAt
 * @property string $text
 * @property int|null $parentTaskId
 */
class TaskTemplateItem extends Model
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
