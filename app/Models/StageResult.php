<?php

namespace App\Models;

use App\TimeMutator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $time
 * @property Rally $rally
 * @property Stage $stage
 * @property Driver $driver
 */
class StageResult extends Model
{
    use HasFactory;

    protected $fillable = ['rally_id', 'driver_id', 'stage_id', 'time'];

    protected function time(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => TimeMutator::toHumanReadable($value),
            set: fn (string $value) => TimeMutator::toMilliseconds($value),
        );
    }

    public function rally(): BelongsTo
    {
        return $this->belongsTo(Rally::class);
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function timeDiffWith(StageResult $result): string
    {
        $diff = $this->getAttributes()['time'] - $result->getAttributes()['time'];

        return TimeMutator::toHumanReadable($diff, true);
    }
}
