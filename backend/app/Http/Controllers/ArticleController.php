<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}
