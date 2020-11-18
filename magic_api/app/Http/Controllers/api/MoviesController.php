<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MovieCategory;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        return Movie::all();
    }

    public function store(Request $request)
    {
        $verifyIfCategoryIdExists = MovieCategory::where('movie_category_id', $request->movie_category_id)->exists();

        // Verifica se o filme existe na tabela
        $verifyIfExists = Movie::where('movie_description', $request->movie_description)->exists();

        if ($verifyIfCategoryIdExists) {
            // Verifica se já existe descrição
            if (!$verifyIfExists) {

                Movie::create($request->all());

                return json_encode([
                    'status' => 'Criado com sucesso!',
                    'movie_category_id' => $request->movie_category_id,
                    'movie_description' => $request->movie_description,
                ], JSON_UNESCAPED_UNICODE);
            } else {
                return json_encode([
                    'status' => "Na tabela movies já tem um filme cadastrado como {$request->movie_description}",
                ], JSON_UNESCAPED_UNICODE);
            }
        } else {
            return json_encode([
                'status' => "O id {$request->movie_category_id} não existe na tabela movies_categories."
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    public function show($id)
    {
        $findId = Movie::where('movie_category_id', '=', $id)->firstOrFail();

        // Se encontrar retorna
        if ($findId) {
            return json_encode([
                'status' => 'Encontrado com sucesso!',
                'movie_category_id' => $findId->movie_category_id,
                'movie_description' => $findId->movie_description,
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    public function update(Request $request)
    {
        $findMovieId = Movie::where('movie_id', '=', $request->movie_id)->firstOrFail();

        // Se encontrado atualiza
        if ($findMovieId) {

            // verifica se id da categoria existe
            $verifyIfCategoryIdExists = MovieCategory::where('movie_category_id', $request->movie_category_id)->exists();

            if ($verifyIfCategoryIdExists) {

                // tenta atualizar
                $update = Movie::where('movie_id', $request->movie_id)->update(['movie_category_id' => $request->movie_category_id, 'movie_description' => $request->movie_description, 'updated_at' => now()]);

                // Se atualizado então monstra resultado positivo
                if ($update) {
                    return json_encode([
                        'status' => 'Atualizado com sucesso!',
                        'movie_category_id' => $request->movie_category_id,
                        'movie_description' => $request->movie_description,
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    return json_encode([
                        'status' => 'Não foi possível atualizar o registro',
                    ], JSON_UNESCAPED_UNICODE);
                }
            } else {
                return json_encode([
                    'status' => "O id {$request->movie_category_id} não existe na tabela movie_categories."
                ], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function destroy(Request $request)
    {
        // Se não encontrar falha
        Movie::where('movie_id', '=', $request->movie_id)->firstOrFail();

        // deleta
        $delete = Movie::where('movie_id', $request->movie_id)->delete();

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
