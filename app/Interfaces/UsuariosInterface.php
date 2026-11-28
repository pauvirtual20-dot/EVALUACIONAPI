<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface
{
    public function findByCorreo(string $correo);

    public function findByNombre(string $nombre);

    public function findByActivo(bool $activo);
}