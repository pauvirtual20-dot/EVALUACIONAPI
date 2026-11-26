<?php

namespace App\Interfaces;

interface InterfaceRol extends BaseInterface
{
    public function findById( int $id_rol);
    public function findByName(string $name);
    public function findByDescription(string $description);
}
