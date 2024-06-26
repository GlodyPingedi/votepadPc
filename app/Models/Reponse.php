<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    protected $fillable = [
        "cote",
        "question_id",
        "candidat_id"
    ] ;

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
