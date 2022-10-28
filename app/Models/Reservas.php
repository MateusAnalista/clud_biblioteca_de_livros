<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'livros_id',
        'user_id',
        'retirada',
        'devolucao',
    ];

    /**
     * The attributes that are dates.
    */
    protected $dates = [
        'created_at',
        'updated_at',
        'retirada',
    ];

    public function Livro()
    {
        return $this->belongsTo(Livros::class, 'livros_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
