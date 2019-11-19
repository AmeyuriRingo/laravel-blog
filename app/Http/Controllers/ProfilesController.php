<?php

namespace App\Http\Controllers;

use App\Profiles;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show($id)
    {

//        DB::enableQueryLog(); // Enable query log
//
//        $profile = User::find($id)->profile()->first();
//
//        dd(DB::getQueryLog());
//        $profileId = 'profile_id_'.$id;
//        if (Cache::has($profileId)) {
//            $profile = Cache::get($profileId);
//        } else {
            $profile = User::find($id)->profile()->first();
//        }
        return view('userProfile', ['profile' => $profile]);
    }

    public function edit(Request $request, $id)
    {
        $profile = Profiles::find($id);
        if ($_REQUEST) {
            $profile->date_of_birth = $_REQUEST['date_of_birth'];
            $profile->country = $_REQUEST['country'];
            $profile->city = $_REQUEST['city'];
            $profile->about_me = $_REQUEST['about_me'];

            $profile->save();

            $profileId = 'profile_id_'.$id;
            Cache::forget($profileId);
        }
        $array = array($profile->user_id);
        return json_encode($array);
    }

    public function updateImage(Request $request, $id){
        $path = $request->file('image')->store('', 'public');
        $profile = Profiles::find($id);
        if (isset($path)){
            $profile->image = $path;
            $profile->save();
        }
        return back();
    }
}
