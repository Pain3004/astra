<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class UserPrivillegeController extends Controller
{
    public function getEditPrivilegeUserList(Request $request){
        $user = User::where('id', '!=', Auth::user()->id)->where('deleteStatus',0)->get();
        return response()->json($user);  
    }
    public function getPrivilegeTable(Request $request){
        $user = User::where('id', '!=', Auth::user()->id)->where('deleteStatus',0)->get();
        return response()->json($user);  
    }
}
