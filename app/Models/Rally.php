<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property string $name
 * @property Carbon $created_at
 */
class Rally extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class);
    }

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(StageResult::class);
    }
}
