<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use hasFactory,softDeletes;
    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    protected $fillable=[
        'name',
        'description'
    ];

public function usuario()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }

public function permissions(): array{
        return config('rol.'.$this->nombre_rol, []);
    }



}





