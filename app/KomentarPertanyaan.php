<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarPertanyaan extends Model
{
    protected $table = 'komentar_pertanyaan';

    protected $guarded = [];

    public function pertanyaan() {
        return $this->belongsTo('App\Pertanyaan', 'pertanyaan_id');
    }

    public function profile() {
        return $this->belongsTo('App\Profile', 'profile_id');
    }
}
