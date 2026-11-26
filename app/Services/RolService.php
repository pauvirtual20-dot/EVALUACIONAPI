<?php

namespace App\Services;

use App\Interfaces\InterfaceRol;
use Illuminate\Validation\ValidationException;

class RolService
{
    protected InterfaceRol $rolRepository;

    public function __construct(InterfaceRol $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }
    public function getAll(){
        return $this->rolRepository->getALL();
    }
    public function getById(int $id){

    $rol = $this->rolRepository->findById($id);
     if (!$rol) {
            throw ValidationException::withMessages([
                'rol' => 'El rol no existe.'
            ]);
        }

        return $rol;
    }
    public function create(array $data){
        return $this->rolRepository->create($data);
    }
    public function update(int $id, array $data){
        return $this->rolInterface->update($id,$data);
    }
    public function delete(int $id){
        return $this->rolInterface->delete($id);
    }
    public function findById( int $id_rol){
        return $this->rolInterface->findById($id_rol);
    }
    public function findByName(string $name){
        return $this->rolInterface->findByName($name);
    }
    public function findByDescription(string $description){
        return $this->rolInterface->findByDescription($description);
    }

}