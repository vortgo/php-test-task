<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * \App\Models\Match
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $date_of_match
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Match whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Match whereDateOfMatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Match whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Match whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Match whereUpdatedAt($value)
 */
class Match extends Model
{
    protected $fillable = [
        'name', 'date_of_match'
    ];

}
