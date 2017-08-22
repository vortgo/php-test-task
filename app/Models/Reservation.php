<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * \App\Models\Reservation
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property int $sector_id
 * @property int $row_id
 * @property int $place_id
 * @property int $match_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Match $rMatch
 * @property-read \App\Models\Place $rPlace
 * @property-read \App\Models\Row $rRow
 * @property-read \App\Models\Sector $rSector
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereMatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation wherePlaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereRowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereSectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Reservation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reservation extends Model
{
    const STATUS_IN_PROCESS = 'in_process';
    const STATUS_RESERVED = 'reserved';

    protected $fillable = [
        'match_id',
        'sector_id',
        'row_id',
        'place_id',
        'status',
        'first_name',
        'last_name',
        'email'
    ];

    public function rPlace()
    {
        return $this->belongsTo(Place::class);
    }

    public function rRow()
    {
        return $this->belongsTo(Row::class);
    }

    public function rSector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function rMatch()
    {
        return $this->belongsTo(Match::class);
    }

    public function getCodeOfPlace()
    {
        return $this->match_id . ':' . $this->sector_id . ':' . $this->row_id . ':' . $this->place_id;
    }
}
