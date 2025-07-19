<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    protected $guarded = [

    ];

    /**
     * Get the cotisations for the year.
     */
    public function Cotisations()
    {
        return $this->hasMany(Cotisation::class);
    }
}
