<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class userController extends Controller
{
    //
    public function dashboard(){
        return view('user.dashboard');
    }

    

  
}
