<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function rally(): BelongsTo
    {
        return $this->belongsTo(Rally::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(StageResult::class);
    }
}
