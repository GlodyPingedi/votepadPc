<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'type',
        'date_debut',
        'date_fin',
        'status',
    ];

    public function phases(){
        return $this->hasMany(Phase::class,"evenement_id");
    }
}
