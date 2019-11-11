<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    public function delete($id){

        User::destroy($id);
        return redirect('/admin');
    }

    public function show(){
        $users = DB::table('users')->paginate(15);

        return view('adminPanel', ['users' => $users]);
    }
}
