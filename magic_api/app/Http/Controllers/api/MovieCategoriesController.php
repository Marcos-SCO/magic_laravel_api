<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MovieCategory;
use Illuminate\Http\Request;

class MovieCategoriesController extends Controller
{
    public function index()
    {
        // Retorna todas categorias de filmes 
        return MovieCategory::all();
    }

    public function store(Request $request)
    {
        $verifyIfDescriptionExists = MovieCategory::where('category_description', $request->category_description)->exists();

        if (!$verifyIfDescriptionExists) {
            MovieCategory::create($request->all());

            return json_encode([
                'status' => 'Criado com sucesso!',
                'category_description' => $request->category_description,
            ], JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode([
                'status' => 'Esse tipo de categoria já existe no Banco de dados...'
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    public function show($id)
    {

        $findId = MovieCategory::where('movie_category_id', '=', $id)->firstOrFail();

        // Se encontrar retorna
        if ($findId) {
            return json_encode([
                'status' => 'Encontrado com sucesso!',
                'movie_category_id' => $findId->movie_category_id,
                'category_description' => $findId->category_description,
            ], JSON_UNESCAPED_UNICODE);
        }
    }

    public function update(Request $request)
    {
        $findId = MovieCategory::where('movie_category_id', '=', $request->movie_category_id)->firstOrFail();

        // Se encontrado atualiza
        if ($findId) {

            // tenta atualizar
            $update = MovieCategory::where('movie_category_id', $request->movie_category_id)->update(['category_description' => $request->category_description, 'updated_at' => now()]);

            // Se atualizado então monstra resultado positivo
            if ($update) {

                return json_encode([
                    'status' => 'Atualizado com sucesso!',
                    'category_description' => $request->category_description,
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
        MovieCategory::where('movie_category_id', '=', $request->movie_category_id)->firstOrFail();

        // deleta
        $delete = MovieCategory::where('movie_category_id', $request->movie_category_id)->delete();

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
