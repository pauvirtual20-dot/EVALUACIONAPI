<?php

namespace App\Repositories;

use App\Models\cliente;
use App\Interfaces\ClienteInterface;

class ClienteRepository extends BaseRepository implements ClienteInterface
{
    public function __construct(Cliente $cliente)
    {
        parent::__construct($cliente);
    }

    public function findByCliente(int $idCliente)
    {
        return $this->model->where("id_cliente", $idCliente)->first();
    }

    public function findByNameCliente(string $nombreCliente)
    {
        return $this->model->where("nombre_cliente", $nombreCliente)->get();
    }
}
