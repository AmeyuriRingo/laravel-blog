<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Http\Requests\CreateArticleRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CreateArticleController extends Controller
{
    public function show(){
        return view('createArticle');
    }

    public function create(CreateArticleRequest $request){
        if (isset($request)) {
            $article = new Articles();

            $article->title = $request->title;
            $article->title_preview = $request->title_preview;
            $article->image_preview = $request->image_preview;
            $article->text = $request->text;
            $article->category = $request->category;

            $article->save();

            $articleId = 'article_id_'.$article->id;
            Cache::forever($articleId, $article);
        }
    }

    public function showEdit($id){

        $articleId = 'article_id_'.$id;
        if (Cache::has($articleId)) {
            $article = Cache::get($articleId);
        } else {
            $article = Articles::find($id);
        }
        return view('createArticle', ['article' => $article]);
    }

    public function edit(CreateArticleRequest $request, $id){
        $articleId = 'article_id_'.$id;
        Cache::forget($articleId);

        $article = Articles::find($id);

        $article->title = $request->title;
        $article->title_preview = $request->title_preview;
        $article->image_preview = $request->image_preview;
        $article->text = $request->text;
        $article->category = $request->category;

        $article->save();
    }
}
