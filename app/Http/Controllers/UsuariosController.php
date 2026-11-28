<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuariosRequest;
use App\Services\UsuariosService;
use Illuminate\Http\JsonResponse;
use Throwable;

class UsuariosController extends Controller
{
    public function __construct(private UsuariosService $UsuariosService)
    {
    }

    // Traer todos los registros
    public function index(): JsonResponse
    {
        try {
            $registrosusuarios = $this->UsuariosService->getAll();

            return response()->json([
                'message' => 'Se listaron todos los usuarios correctamente',
                'data' => $registrosusuarios,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al listar los usuarios',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Crear un registro
    public function store(UsuariosRequest $request): JsonResponse
    {
        try {
            $registrousuarios = $this->UsuariosService->create($request->validated());

            return response()->json([
                'message' => 'El usuario se creó correctamente',
                'data' => $registrousuarios,
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Ocurrió un error al crear el usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Traer un registro por id
    public function show(int $id): JsonResponse
    {
        try {
            $registro = $this->UsuariosService->getById($id);

            if (!$registro) {
                return response()->json([
                    'message' => 'No se encontró el registro con ese id',
                ], 404);
            }

            return response()->json([
                'message' => 'Se listó el registro correctamente',
                'data' => $registro,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Ocurrió un error al listar el registro por id',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Actualizar un registro
    public function update(UsuariosRequest $request, int $id): JsonResponse
    {
        try {
            $registroActualizado = $this->UsuariosService->update($id, $request->validated());

            if (!$registroActualizado) {
                return response()->json([
                    'message' => 'No se encontró el registro con ese id',
                ], 404);
            }

            return response()->json([
                'message' => 'Se actualizó el registro correctamente',
                'data' => $registroActualizado,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Ocurrió un error al actualizar el registro',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Eliminar un registro
    public function destroy(int $id): JsonResponse
    {
        try {
            $validar = $this->UsuariosService->delete($id);

            if (!$validar) {
                return response()->json([
                    'message' => 'No se encontró el registro con ese id',
                ], 404);
            }

            return response()->json([
                'message' => 'El usuario se eliminó correctamente',
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Ocurrió un error al eliminar el usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}