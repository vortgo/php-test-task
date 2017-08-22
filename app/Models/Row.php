<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * \App\Models\Row
 *
 * @property int $id
 * @property string $name
 * @property int $sector_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Place[] $rPlaces
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Row whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Row whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Row whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Row whereSectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Row whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Row extends Model
{
    protected $fillable = ['name', 'sector_id'];

    public function rPlaces()
    {
        return $this->hasMany(Place::class);
    }
}
