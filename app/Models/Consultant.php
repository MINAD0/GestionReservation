<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultant extends Model
{
    use HasFactory;
    protected $table = 'consultants';
    protected $fillable = ['Nom',
    'Prenom',
    'Email'
    ];
}
