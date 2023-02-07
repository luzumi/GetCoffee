<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SendRequestToRasp extends Controller
{
    public function getUser()
    {
        //request to rasp

        $user = User::first();

        header("Content-Type: text/event-stream");
        header("Cache-Control: no-cache");
        header("Connection: keep-alive");


            // Trigger event when necessary
        sleep(5);
        echo "data: " . json_encode(['user' => $user]) . "\n\n";
        ob_flush();
        flush();

        return response()->json(['user' => $user]);
    }
}
