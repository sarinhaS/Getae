<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $fillable = ['titulo', 'conteudo', 'imagem'];
}
