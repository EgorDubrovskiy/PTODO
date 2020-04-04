<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TaskTemplate
 * @package App\Models
 * @property-read int $id
 * @property-read string $createdAt
 * @property-read string $updatedAt
 * @property-read string|null $deletedAt
 * @property string $name
 * @property int $taskTemplateItemId
 */
class TaskTemplate extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
