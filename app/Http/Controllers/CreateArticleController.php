<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Http\Requests\CreateArticleRequest;
use App\User;
use Illuminate\Http\Request;

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
        }
    }

    public function showEdit($id){
        $article = Articles::find($id);

        return view('createArticle', ['article' => $article]);
    }

    public function edit(CreateArticleRequest $request, $id){
        $article = Articles::find($id);

        $article->title = $request->title;
        $article->title_preview = $request->title_preview;
        $article->image_preview = $request->image_preview;
        $article->text = $request->text;
        $article->category = $request->category;

        $article->save();
    }
}
