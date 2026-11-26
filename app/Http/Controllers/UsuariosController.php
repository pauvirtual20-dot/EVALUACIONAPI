<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FichaService;
use App\Http\Requests\FichaRequest;

class UsuariosController extends Controller
{
    public function __construct(private UsuariosService $UsuariosService)
    {
    }

    // Traer todos los registros
    public function index()
    {
        $registrosusuarios = $this->UsuariosService->getAll();

        return response()->json([
            'message' => "Se listaron todos los usuarios correctamente",
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(FichaRequest $request)
    {
        $registrousuarios = $this->UsuariosService->create($request->validated());
               
        return response()->json([
            'message' => 'El usuario se creó correctamente',
            'datosRegistrados' => $registroFicha
        ], 201);
    }
     // Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->UsuariosService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'data' => $registro
        ], 200);
    }
    
    // Actualizar un registro
    public function update(UsuariosRequest $request, string $id)
    {
        $registroActualizado = $this->UsuariosService->update($id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el registro correctamente',
            'data' => $registroActualizado
        ], 200);
    }
     // Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->UsuariosService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'El usuario se eliminó correctamente',
        ], 200); 
    }
}