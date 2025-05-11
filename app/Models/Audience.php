<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'medecin_id', 'speciality_id', 
        'scheduled_at', 'status', 'reason', 'cancellation_reason', 'rescheduled_to'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialitie::class);
    }
}
