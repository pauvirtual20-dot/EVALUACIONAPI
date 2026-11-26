<?php

namespace App\Interfaces;

interface ClienteInterface extends BaseInterface
{
    public function findById( int $id_cliente);
    public function findByuserId( int $user_id);
    public function findByTipoDocumento( int $tipo_documento);
    public function findByNumeroDocumento( int $numero_documento);
    public function findByNombres( int $nombres);
    public function findByApellidos( int $apellidos);
    public function findByCorreo( int $correo);
    public function finByTelefono( int $telefono);
    public function findByDireccion( int $direccion);
}