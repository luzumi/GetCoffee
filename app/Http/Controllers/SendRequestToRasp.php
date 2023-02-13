<?php

namespace App\Http\Controllers;

use App\Models\RaspUser;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class SendRequestToRasp extends Controller
{
    public function getUser()
    {
        $id = RaspUser::first()->user_id;
        $user = User::find($id);

        header("Content-Type: text/event-stream");
        header("Cache-Control: no-cache");

        echo "data: " . json_encode(['user' => $user]);

        ob_flush();
        flush();
    }
}

