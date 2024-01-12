<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function rally(): HasOne
    {
        return $this->hasOne(Rally::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(StageResult::class);
    }
}
