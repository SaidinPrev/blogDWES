<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Usuari;

class Post extends Model
{

    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'titol',
        'contingut',
    ];

    public function usuari()
    {
        return $this->belongsTo(Usuari::class);
    }

    public function comentaris()
    {
        return $this->hasMany(Comentari::class);
    }
}
