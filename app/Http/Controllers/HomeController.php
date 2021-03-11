<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $all_users = DB::select('SELECT * from users');
        return view('welcome', ['all_users' => $all_users]);
    }
}
