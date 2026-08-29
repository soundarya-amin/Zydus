<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegigrationController extends Controller
{
    public function index(){
        return view('register_form');
    }
}
