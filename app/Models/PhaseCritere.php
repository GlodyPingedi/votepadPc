<?php

namespace App\Models;

use App\Models\Phase;
use App\Models\Intervenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhaseCritere extends Model
{
    use HasFactory;
    protected $fillable = [
        'critere_id',
        'phase_id',
        'echelle'
    ];  

    public function critere(): BelongsTo
    {
        return $this->belongsTo(Critere::class);
    }

    public function phase(): BelongsTo
    {
        return $this->belongsTo(Phase::class);
    }
}
