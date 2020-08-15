<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function pertanyaan() {
        return $this->hasMany('App\Pertanyaan', 'profile_id');
    }

    public function komentarPertanyaan() {
        return $this->hasMany('App\KomentarPertanyaan', 'profile_id');
    }
}
