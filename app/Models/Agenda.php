<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable=[
        "medecin_id",
        "day_of_week",
        "start_time",
        "end_time"
    ];

    public function Medecins()
    {
        return $this->belongsTo(Medecin::class,'medecin_id');
    }
}
