<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\User;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Mail;

class createUserController extends Controller
{
    public function create(CreateUserRequest $request){
        if (isset($request)) {
            $user = new User();

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->rank = $request->rank;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            $userId = 'user_id_'.$user->id;
            Cache::forever($userId, $user);
        }
    }

    public function show(){
        return view('createUser');
    }

    public function showEdit($id){

        $user = User::find($id);

        return view('createUser', ['user' => $user]);
    }

    public function edit(EditUserRequest $request, $id){
        $userId = 'user_id_'.$id;
        Cache::forget($userId);

        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->rank = $request->rank;
        $user->email = $request->email;

        $user->save();
    }
}
