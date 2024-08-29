<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashbord(){

        $adminRequest = User::where('is_admin',NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writeRequests =User::where('is_writer', NULL)->get();
        return view('admin.dashbord', compact('adminRequests', 'revisorRequest', 'writerRequests'));
    }

    public function setAdmin(User $user){
        $user->is_admin = true;
        $user->save();
        return redirect(route('admin.dashbord'))->with('message', "Hai reso $user->name amministratore");

    }

    public function setRevisor(User $user){
        $user->is_revisor = true;
        $user->save();
        return redirect(route('admin.dashbord'))->with('message', "Hai reso $user->name revisore");

    }

    public function setWriter(User $user){
        $user->is_writer = true;
        $user->save();
        return redirect(route('admin.dashbord'))->with('message',"Hai reso $user->name redattore");
    }

}
