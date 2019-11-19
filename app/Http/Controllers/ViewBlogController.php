<?php

namespace App\Http\Controllers;

use App\Profiles;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ViewBlogController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        $ifExist = User::find($id)->profile()->first();
        if (!isset($ifExist->id)) {
            if (Auth::user()->rank == 1){
                $user = User::find($id);
                $profile = new \App\Profiles();

                $profile->user_id = $id;
                $profile->first_name = $user->first_name;
                $profile->last_name = $user->last_name;
                $profile->email = $user->email;

                $profile->save();

                $profileId = 'profile_id_'.$profile->id;
                Cache::forever($profileId, $profile);
            }
        }

        $articles = DB::table('articles')->paginate(4);

        return view('blog', ['articles' => $articles, 'profile' => $ifExist]);
    }
}
