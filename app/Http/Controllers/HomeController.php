<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = ['name'=>'hans'];
        $viewData["title"] = "Home Page - GetMeCoffee";

        return view('welcome')->with( compact("viewData"));
    }
}
