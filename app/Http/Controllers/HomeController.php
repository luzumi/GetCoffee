<?php

namespace App\Http\Controllers;

use App\Models\RaspUser;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = ['name'=>'hans'];
        $viewData["title"] = "Home Page - GetMeCoffee";
        RaspUser::first()->update([
            'user_id' => 0,
        ]);

        return view('welcome')->with( compact("viewData"));
    }
}
