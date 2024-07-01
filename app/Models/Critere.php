<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Critere extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'ponderation',
        ];

        public function phases()
        {
            return $this->belongsToMany(Phase::class, 'phase_criteres', 'critere_id', 'phase_id');
        }
}
