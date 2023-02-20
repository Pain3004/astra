<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Company;
use Hash;

class DashboardController extends Controller
{
    
   public function index(){
   $data=Company::all();
    return view('dashboard');
   }
}