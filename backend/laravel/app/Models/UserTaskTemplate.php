<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserTaskTemplate
 * @package App\Models
 *
 * Database fields:
 * @property-read int $id
 * @property-read string $created_at
 * @property-read string $updated_at
 * @property-read string|null $deleted_at
 * @property string $name
 * @property bool $available_for_all
 * @property int $user_id
 */
class UserTaskTemplate extends Model
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
