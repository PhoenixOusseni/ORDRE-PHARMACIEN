<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutreDiplome extends Model
{
    protected $guarded = [

    ];

    function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
