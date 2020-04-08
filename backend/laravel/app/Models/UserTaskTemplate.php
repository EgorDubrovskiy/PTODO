<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTaskTemplate
 * @package App\Models
 * @property-read int $id
 * @property-read string $created_at
 * @property-read string $updated_at
 * @property string $name
 * @property bool $available_for_all
 * @property int $task_template_id
 * @property int $user_id
 */
class UserTaskTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
