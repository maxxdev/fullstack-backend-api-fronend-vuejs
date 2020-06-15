<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Exceptions\InvalidFilterQuery;

class ArticleController extends Controller
{
    /**
     * Display resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=Article::all();
        return response()->json($list, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Article $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::findOrFail($id);
        return response()->json($article, Response::HTTP_OK);
    }

    /**
     * Display filtered resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {


        try {
            $list=QueryBuilder::for(Article::class)
                ->allowedFilters(['title', 'content', 'category.name'])
                ->get();

            return response()->json($list, Response::HTTP_OK);
        } catch (InvalidFilterQuery $e) {
            $errors=[
                'error'=>$e->getMessage()
            ];

            return response()->json($errors, Response::HTTP_BAD_REQUEST);
        }
    }
}
