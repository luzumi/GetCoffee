<?php

namespace App\Http\Controllers;

use App\Models\User;

class MenuController extends Controller
{
    public function show(int|string $id)
    {
        $viewData = User::find($id);
        return view('menu')->with(compact('viewData'));
    }
}
