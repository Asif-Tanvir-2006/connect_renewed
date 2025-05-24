<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomTable;

class TestLoginController extends Controller
{
    function testLogin(Request $request){
        $value = $request->cookie('UIDstr');
        $user = CustomTable::where('id', intval($value))->first();
        if($user){
            return response()->json(['user'=>$value]);
        }
        else{
            return response()->json(['not registered'=>$value]);
        }
    }
}
