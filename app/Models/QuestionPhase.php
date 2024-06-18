<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPhase extends Model
{
    use HasFactory;
    protected $fillable = [
        "phase_id",
        "question_id",
        "ponderation"
    ] ;
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function phase(){
        return $this->belongsTo(Phase::class);
    }
}
