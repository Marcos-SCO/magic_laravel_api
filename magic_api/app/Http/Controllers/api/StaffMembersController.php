<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StaffMember;
use App\Models\StaffType;

class StaffMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StaffMember::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Verifica se o tipo de funcionário existe na tabela staff_types
        $verifyIfTypeExists = StaffType::where('staff_type_id', $request->staff_type_id)->exists();
        // Verifica na tabela se o email já existe
        $verifyIfEmailExists = StaffMember::where('email', $request->email)->exists();

        // Se o tipo existe e o email não, então persiste as informações
        if ($verifyIfTypeExists) {
            if (!$verifyIfEmailExists) {

                StaffMember::create($request->all());

                return json_encode([
                    'status' => 'Funcionário criado com sucesso!',
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'staff_type_id' => $request->staff_type_id,
                ], JSON_UNESCAPED_UNICODE);
            } else {
                return json_encode([
                    'status' => 'Já existe um usuário cadastrado com esse email na tabela staff_members'
                ], JSON_UNESCAPED_UNICODE);
            }
        } else {

            return json_encode([
                'status' => 'Não foi possível persistir o registro...'
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    public function show($id)
    {
        $findId = StaffMember::where('staff_member_id', '=', $id)->firstOrFail();

        // Se encontrar retorna
        if ($findId) {
            return json_encode([
                'status' => 'Encontrado com sucesso!',
                'staff_member_id' => $findId->staff_member_id,
                'first_name' => $findId->first_name,
                'last_name' => $findId->last_name,
                'email' => $findId->email,
                'staff_type_id' => $findId->staff_type_id,
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    public function update(Request $request)
    {
        $findEmail = StaffMember::where('email', '=', $request->email)->firstOrFail();

        // Se encontrado atualiza
        if ($findEmail) {
            // Verifica se o tipo de funcionário existe na tabela staff_types
            $verifyIfTypeExists = StaffType::where('staff_type_id', $request->staff_type_id)->exists();

            if ($verifyIfTypeExists) {

                // tenta atualizar
                $update = StaffMember::where('email', $request->email)->update(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'staff_type_id' => $request->staff_type_id, 'updated_at' => now()]);

                // Se atualizado então monstra resultado positivo
                if ($update) {
                    return json_encode([
                        'status' => 'Atualizado com sucesso!',
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'staff_type_id' => $request->staff_type_id,
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    return json_encode([
                        'status' => 'Não foi possível atualizar o registro',
                    ], JSON_UNESCAPED_UNICODE);
                }
            } else {
                return json_encode([
                    'status' => 'Tipo de funcionário não existe na tabela staff_types',
                ], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function destroy(Request $request)
    {
        // Se não encontrar falha
        StaffMember::where('email', '=', $request->email)->firstOrFail();

        // deleta
        $delete = StaffMember::where('email', $request->email)->delete();

        if ($delete) {
            return json_encode([
                'status' => 'Registro deletado com sucesso!',
            ], JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode([
                'status' => 'Não foi possível deletar',
            ], JSON_UNESCAPED_UNICODE);
        }
    }
}
