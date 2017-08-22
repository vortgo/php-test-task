<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * \App\Models\Sector
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Row[] $rRows
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sector whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sector whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sector whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sector extends Model
{
    protected $fillable = ['name'];

    public function rRows()
    {
        return $this->hasMany(Row::class);
    }
}
