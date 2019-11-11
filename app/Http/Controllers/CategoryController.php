<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show($category)
    {
        $articles = DB::table('articles')->where('category', '=', $category)->paginate(15);

        return view('category', ['articles' => $articles]);
    }
}
