<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = ['filier_id',
    	'groupe',
        'salle_id',
        'date_Debut',
        'date_Fin',
        'consultant_id',
        'type',
        'choix',
        'statue'
    ];

    public function filiere()
    {
        return $this->belongsTo( Filier::class, 'filier_id');
    }
    public function salle()
    {
        return $this->belongsTo( Salle::class, 'salle_id');
    }
    public function consultant()
    {
        return $this->belongsTo( Consultant::class, 'consultant_id');
    }
}
