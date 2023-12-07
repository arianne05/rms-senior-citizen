<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeniorCitizenController extends Controller
{
    public function login(){
        return view('index')->with('title','Login');
    }
}
