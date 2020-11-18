<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StaffType;

class StaffTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retorna todos tipos de equipes cadastradas 
        return StaffType::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verifyIfTypeExists = StaffType::where('staff_type_id', $request->staff_type_id)->exists();
        $verifyIfDescriptionExists = StaffType::where('staff_description', $request->staff_description)->exists();

        if (!$verifyIfTypeExists && !$verifyIfDescriptionExists) {
            StaffType::create($request->all());

            return json_encode([
                'status' => 'Tipo criado com sucesso!',
                'staff_type_id' => $request->staff_type_id,
                'staff_description' => $request->staff_description,
            ], JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode([
                'status' => 'Esse tipo de funcionário já existe no Banco de dados...'
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $findId = StaffType::where('staff_type_id', '=', $id)->firstOrFail();

        // Se encontrar retorna
        if ($findId) {
            return json_encode([
                'status' => 'Encontrado com sucesso!',
                'staff_type_id' => $findId->staff_type_id,
                'staff_description' => $findId->staff_description,
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $findId = StaffType::where('staff_type_id', '=', $request->id)->firstOrFail();

        // Se encontrado atualiza
        if ($findId) {

            // tenta atualizar
            $update = StaffType::where('staff_type_id', $request->id)->update(['staff_description' => $request->staff_description, 'updated_at' => now()]);

            // Se atualizado então monstra resultado positivo
            if ($update) {

                return json_encode([
                    'status' => 'Tipo atualizado com sucesso!',
                    'staff_description' => $request->staff_description,
                ], JSON_UNESCAPED_UNICODE);
            } else {
                return json_encode([
                    'status' => 'Não foi possível atualizar o registro',
                ], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function destroy(Request $request)
    {
        // Se não encontrar falha
        StaffType::where('staff_type_id', '=', $request->id)->firstOrFail();

        // deleta
        $delete = StaffType::where('staff_type_id', $request->id)->delete();

        if ($delete) {
            return json_encode([
                'status' => 'Registro deletado com sucesso!',
            ], JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode([
                'status' => 'Não foi possível atualizar deletar',
            ], JSON_UNESCAPED_UNICODE);
        }
    }
}
