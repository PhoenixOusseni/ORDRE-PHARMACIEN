<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    function Role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    function Section() {
        return $this->belongsTo(Section::class, 'section_id');
    }

    function RegionOrdinal() {
        return $this->belongsTo(RegionOrdinal::class, 'region_ordinal_id');
    }

    function Region() {
        return $this->belongsTo(Region::class, 'region_id');
    }

    function Province() {
        return $this->belongsTo(Province::class, 'province_id');
    }

    function Commune() {
        return $this->belongsTo(Commune::class, 'commune_id');
    }

    function Cotisation() {
        return $this->hasMany(Cotisation::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
