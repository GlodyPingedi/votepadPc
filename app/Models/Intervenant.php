<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Intervenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'coupon',
        'groupe_id'
    ];
    public function phases(): BelongsToMany
    {
        return $this->belongsToMany(Phase::class, 'intervenant_phases');
    }
}
