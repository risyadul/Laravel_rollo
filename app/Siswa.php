<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama', 'jenisKelamin', 'agama', 'alamat', 'avatar', 'user_id'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.png');
        } else{
            return asset('images/'.$this->avatar);
        }
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class);
    }
}

