<?php

namespace App\Repositories;

use App\Models\Rol;
use Carbon\Carbon;
use App\Interfaces\InterfaceRol;

class  AccesoRepository extends BaseRepository implements InterfaceRol {  

        public function __construct(Roles $rol)
    {
        parent::__construct($rol);
    }
    public function findById( int $id_rol){
        return $this->model->where('id_rol',$id_rol)->get();
    }
    public function findByName(string $name){
        return $this->model->where('name',$name)->get();
    }
    public function findByDescription(string $description){
        return $this->model->where('description',$description)->get();
    }

}