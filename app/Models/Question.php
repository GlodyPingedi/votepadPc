<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        "question",
        "ponderation",
        "statut",
        "phase_id",
    ];
    public function questionPhase(){
        return $this->hasMany(Phase::class);
    }
    public function phase(){
        return $this->belongsTo(Phase::class);
    }
    public function assertion(){
        return $this->hasMany(Assertion::class);
    }
}
