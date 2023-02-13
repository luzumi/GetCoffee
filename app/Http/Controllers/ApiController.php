<?php

namespace App\Http\Controllers;

use App\Models\RaspUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function receiveData(Request $request)
    {
        $username = $request->input('data');
        $user = User::where('username', $username)
            ->first();
        Log::info('Rfid-Login from Raspberry Pi: ', [$user, $request->method(), $request->path(), $request->header()]);

        RaspUser::first()->update([
            'user_id' => $user->id,
        ]);
//        event(new LoginEvent($user));
        return response()->json(['user'=> $user]);
    }

    public function resetUserId()
    {
        $this->resetRaspUser();

        return view('welcome');
    }

    public function turn_on()
    {

        //create request to Raspberry Pi with 192.168.2.179:8001
        $url = 'http://192.168.2.179:8080/turn_on';
        $data = array('type' => 'relais-on');
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r",
                'method'  => 'GET',
                'content' => json_encode($data),
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
            /* Handle error */
        }
        return view('welcome');



    }

    public function turn_off()
    {
        //create request to Raspberry Pi with 192.168.2.179:8001
        $url = 'http://192.168.2.179:8080/turn_off';
        $data = array('type' => 'relais-off');
        $options = array(
            'http' => array(
                'header' => "Content-type: application/json\r",
                'method' => 'GET',
                'content' => json_encode($data),
            ),
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            /* Handle error */
        }
        $this->resetRaspUser();

        return view('welcome');
    }

    /**
     * @return void
     */
    public function resetRaspUser(): void
    {
        RaspUser::first()->update([
            'user_id' => 0,
        ]);
    }
}
