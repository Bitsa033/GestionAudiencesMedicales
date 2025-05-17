<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'speciality_id', 'is_available'];

    public function specialties()
    {
        return $this->belongsTo(Specialitie::class);
    }

    public function Audiences()
    {
        return $this->hasMany(Audience::class);
    }

    public function Agendas()
    {
        return $this->hasMany(Agenda::class);
    }
}
