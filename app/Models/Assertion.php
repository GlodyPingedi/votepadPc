<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assertion extends Model
{
    use HasFactory;
    protected $fillable = [
        "assertion",
        "ponderation",
        "statut",
        "question_id",
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
