<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function receiveData(Request $request)
    {
        $username = $request->input('data');
        $viewData = User::where('username', $username)
            ->get();
        Log::info('Rfid-Login from Raspberry Pi: ', [$request->method(), $request->path(), $request->url(), $request->header(), $request->isJson()]);

        return response()->stream(function () use ($viewData) {
            echo "event: update\n";
            echo "data: " . json_encode([
                    'message' => $viewData
                ]);
            echo "\n\n";
            ob_flush();
            flush();
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache'
        ]);
    }
}
