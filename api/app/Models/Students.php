<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\StudentsFactory;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'email',        
        'cpf',
        'ra',
    ];

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    public $incrementing = true;

    protected static function newFactory()
    {
        return StudentsFactory::new();
    }
}
