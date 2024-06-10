<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phase extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "description",
        "statut",
        "date_debut",
        "date_fin",
        "evenement_id"
    ];

    public function evenement():BelongsTo
    {
        return $this->belongsTo(Evenement::class,"evenement_id");
    }
}
