<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class IntroductionController extends Controller
{

    public function getDetial($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return back();
        }

        $Data['user'] = $user;
        $Data['vip'] = User::where('role', 'vip')->get();

        return view('introduciton.index', compact(['Data']));
    }
}
