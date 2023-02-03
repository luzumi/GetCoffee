<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{
    public function show($data)
    {
        $viewData = $data;
        return view('menu', compact('viewData'));
    }
}
