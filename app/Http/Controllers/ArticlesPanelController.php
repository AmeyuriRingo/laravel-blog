<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Support\Facades\DB;

class ArticlesPanelController extends Controller
{
    public function delete($id){

        Articles::destroy($id);
        return redirect('/articles');
    }

    public function show(){
        $articles = DB::table('articles')->paginate(15);

        return view('articlesPanel', ['articles' => $articles]);
    }
}
