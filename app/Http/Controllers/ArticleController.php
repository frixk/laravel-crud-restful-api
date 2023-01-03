<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function getArticle()
    {
        return response()->json(Article::all(), 200);
    }

    public function getArticleId($id)
    {
        $article = Article::find($id);
        if(is_null($article)){
            return response()->json(['message' => 'Article not found!'], 404);
        }
        return response($article::find($id),200);
    }

    public function createArticle(Request $request)
    {
        $articles = Article::create($request->all());
        return response($articles,201);
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id);
        if(is_null($article)){
            return response()->json(['message' => 'Article not found!'], 404);
        }
        $article->update($request->all());
        return response($article,201);
    }

    public function deleteArticle(Request $request, $id)
    {
        $article = Article::find($id);
        if(is_null($article)){
            return response()->json(['message' => 'Article not found!'], 404);
        }
        $article->delete();
        return response()->json(Article::all(), 200);
    }

}
