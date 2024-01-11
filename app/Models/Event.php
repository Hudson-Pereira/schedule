<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model //model sempre em letra maiuscula e singular
{
    use HasFactory;

    protected $casts = [ //casts utilizado para definir array no model
        'itens' => 'array'
    ];

    protected $dates = ['date']; //campo de data
}
