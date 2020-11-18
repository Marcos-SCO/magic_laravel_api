<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\MovieStaffRelation;
use App\Models\StaffMember;
use Illuminate\Http\Request;

class MovieStaffRelationsController extends Controller
{
    public function index()
    {
        return MovieStaffRelation::all();
    }

    public function store(Request $request)
    {
        // Verifica se filme existe
        $verifyIfMovieIdExists = Movie::where('movie_id', $request->movie_id)->exists();
        // Verifica se funcionário existe
        $verifyIfStaffMemberIdExists = StaffMember::where('staff_member_id', $request->staff_member_id)->exists();

        if ($verifyIfMovieIdExists && $verifyIfStaffMemberIdExists) {
            // Verifica se existe mais de uma linha com o mesmo id de filme e id de funcionário
            $verifyIfStaffMemberAlreadyExistInField = MovieStaffRelation::where(['movie_id' => $request->movie_id, 'staff_member_id' => $request->staff_member_id])->exists();

            if (!$verifyIfStaffMemberAlreadyExistInField) {

                MovieStaffRelation::create($request->all());

                return json_encode([
                    'status' => 'Criado com sucesso!',
                    'movie_id' => $request->movie_id,
                    'staff_member_id' => $request->staff_member_id,
                ], JSON_UNESCAPED_UNICODE);
            } else {
                return json_encode([
                    'status' => "Na tabela já existe uma relação com o filme de Id {$request->movie_id} e funcionário de Id {$request->staff_member_id}",
                ], JSON_UNESCAPED_UNICODE);
            }
        } else {
            return json_encode([
                'status' => "Os id's informados não existem na tabelas"
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    public function show($id)
    {
        $findId = MovieStaffRelation::where('movie_staff_relation_id', '=', $id)->firstOrFail();

        // Se encontrar retorna
        if ($findId) {
            return json_encode([
                'status' => 'Encontrado com sucesso!',
                'movie_id' => $findId->movie_id,
                'staff_member_id' => $findId->staff_member_id
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    public function update(Request $request)
    {
        $findStaffRelationId = MovieStaffRelation::where('movie_staff_relation_id', '=', $request->movie_staff_relation_id)->firstOrFail();

        // Se encontrado atualiza
        if ($findStaffRelationId) {

            // Verifica se filme existe
            $verifyIfMovieIdExists = Movie::where('movie_id', $request->movie_id)->exists();
            // Verifica se funcionário existe
            $verifyIfStaffMemberIdExists = StaffMember::where('staff_member_id', $request->staff_member_id)->exists();

            if ($verifyIfMovieIdExists && $verifyIfStaffMemberIdExists) {
                // Verifica se existe mais de uma linha com o mesmo id de filme e id de funcionário
                $verifyIfStaffMemberAlreadyExistInField = MovieStaffRelation::where([
                    'movie_id' => $request->movie_id,  'staff_member_id' => $request->staff_member_id
                ])->exists();

                if (!$verifyIfStaffMemberAlreadyExistInField) {

                    // tenta atualizar
                    $update = MovieStaffRelation::where('movie_id', $request->movie_id)->update(['staff_member_id' => $request->staff_member_id, 'updated_at' => now()]);

                    // Se atualizado então monstra resultado positivo
                    if ($update) {
                        return json_encode([
                            'status' => 'Atualizado com sucesso!',
                            'movie_id' => $request->movie_id,
                            'staff_member_id' => $request->staff_member_id,
                        ], JSON_UNESCAPED_UNICODE);
                    } else {
                        return json_encode([
                            'status' => 'Não foi possível atualizar o registro',
                        ], JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    return json_encode([
                        'status' => "Na tabela já existe uma relação com o filme de Id {$request->movie_id} e funcionário de Id {$request->staff_member_id}",
                    ], JSON_UNESCAPED_UNICODE);
                }
            } else {
                return json_encode([
                    'status' => "Os id's informados não existem na tabelas"
                ], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function destroy(Request $request)
    {
        // Se não encontrar falha
        MovieStaffRelation::where('movie_staff_relation_id', '=', $request->movie_staff_relation_id)->firstOrFail();

        // deleta
        $delete = MovieStaffRelation::where('movie_staff_relation_id', $request->movie_staff_relation_id)->delete();

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
