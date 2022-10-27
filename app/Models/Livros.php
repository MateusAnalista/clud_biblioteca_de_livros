<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'roles',
        'titulo',
        'editora',
        'genero_id',
        'user_id',
        'descricao',
        'imagem',
        'pdf',
    ];

    /**
     * The attributes that are dates.
    */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function genero()
    {
        return $this->belongsTo(Generos::class, 'genero_id', 'id');
    }
    
}
