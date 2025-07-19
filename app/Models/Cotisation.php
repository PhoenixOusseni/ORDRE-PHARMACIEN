<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    protected $guarded = [

    ];

    function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    function Annee() {
        return $this->belongsTo(Annee::class, 'annee_id');
    }
}
