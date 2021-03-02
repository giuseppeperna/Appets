<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $primaryKey = 'rist_id';

    protected $fillable = [
        'email', 'password', 'rist_nome', 'rist_descrizione', 'rist_indirizzo', 'rist_p_iva'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipologie() {
        return $this->belongsToMany("App\Tipologia", "tipologie_ristoranti", "rist_id", "tipologia_id");
    }

    public function piatti() {
        return $this->hasMany("App\Piatto", "rist_id", "piatto_id");
    }
}
