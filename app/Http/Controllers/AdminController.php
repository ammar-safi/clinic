<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function changePassword () {
        return view("admin.changePassword") ;
    }
    public function changingPassword (Request $request) {
        // dd(Auth::user()) ;
        // if(Auth::user()->) {
        //     if() {

        //     }
        // } else {

        // }
    }
}
