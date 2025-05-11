<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'speciality_id', 'is_available'];

    public function specialtie()
    {
        return $this->belongsTo(Specialitie::class);
    }

    public function Audience()
    {
        return $this->hasMany(Audience::class);
    }

    public function Agenda()
    {
        return $this->hasMany(Agenda::class);
    }
}
