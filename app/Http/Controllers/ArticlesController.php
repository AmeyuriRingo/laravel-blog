<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Comments;
use App\Profiles;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentConfirmation;

class ArticlesController extends Controller
{
    public function show($category, $id)
    {
        $articleId = 'article_id_'.$id;
        if (Cache::has($articleId)) {
            $article = Cache::get($articleId);
        } else {
            $article = Articles::find($id);
        }
        $comments = Articles::find($id)->comments()->where('confirmed', '1')->get();
        return view('article', ['article' => $article, 'comments' => $comments]);
    }

    public function addComment($category, $id){
        $comment = new Comments();
        $profile = User::find(Auth::user()->id)->profile()->first();

        $comment->user_id = Auth::user()->id;
        $comment->articles_id = $id;
        $comment->text = $_REQUEST['comment'];
        $comment->first_name = $profile->first_name;
        $comment->last_name = $profile->last_name;
        $comment->image = $profile->image;
//        $comment->image = 'dsadsadasdas';
        $comment->confirmed = '0';

        $comment->save();

        $data = $comment->id;

        Mail::to('mramsterdamsss@gmail.com')->send(new CommentConfirmation($data));

        $array = array('category'=>$category, 'id'=>$id);
        return json_encode($array);
    }

    public function showComment($id)
    {
        $comment = Comments::find($id);
        if ($comment->confirmed == 1){
            return redirect('/');
        } else {
            return view('commentConfirmation', ['comment' => $comment]);
        }
    }

    public function confirmComment($id)
    {
        $comment = Comments::find($id);
        $comment->confirmed = 1;
        $comment->save();
        return redirect('/');
    }
}
