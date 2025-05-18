<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'medecin_id', 'speciality_id', 
        'scheduled_date_at','scheduled_time_at', 'status', 'reason', 'cancellation_reason', 'rescheduled_to'
    ];

    protected $casts = [
        'scheduled_date_at' => 'date',
        'scheduled_time_at' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class,'medecin_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Specialitie::class,'speciality_id');
    }
}
