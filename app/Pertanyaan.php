<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = "pertanyaan";

    protected $fillable = ["judul", "isi"];

    public function jawaban() {
        return $this->hasMany('App\Jawaban', 'pertanyaan_id');

        return $this->belongsTo('App\Jawaban', 'jawaban_tepat_id');
    }

    public function profile() {
        return $this->belongsTo('App\Profile', 'profile_id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag', 'pertanyaan_tag', 'pertanyaan_id', 'tag_id');
    }
}
