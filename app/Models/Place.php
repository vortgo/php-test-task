<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * \App\Models\Place
 *
 * @property int $id
 * @property string $name
 * @property int $row_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Place whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Place whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Place whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Place whereRowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Place whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Place extends Model
{
    protected $fillable = ['row_id', 'name'];
}
