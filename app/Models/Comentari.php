<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentari extends Model
{
    use HasFactory;
    protected $table = 'comentaris';

    protected $fillable = [
        'contingut'
    ];

    public function usuari()
    {
        return $this->belongsTo(Usuari::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
