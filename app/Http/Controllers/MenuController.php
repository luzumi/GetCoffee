<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{
    public function show(int $id)
    {
        $viewData = User::findOrFail($id);
        return view('menu', $id)->with(compact('viewData'));
    }
}
