<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=Category::all();
        return response()->json($list, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::findOrFail($id);
        return response()->json($category, Response::HTTP_OK);
    }

}
