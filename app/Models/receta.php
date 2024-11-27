<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receta extends Model
{
    use HasFactory;
    protected $table = 'receta';
    protected $fillable = ['nombre', 'descripcion', 'ingredientes', 'instrucciones', 'imagen', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
