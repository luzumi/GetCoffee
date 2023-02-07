@extends('layouts.app')
@section('content')
    <div class="text-center">
        GetMeCoffee
        {{ route('send-request-to-rasp') }}

    </div>
    <script>
        const evtSource = new EventSource(' {{ route('send-request-to-rasp') }} ');
        // console.log(evtSource);
        //
        evtSource.onmessage = function(event) {
            console.log("Data received: " + event.data);
            var data = JSON.parse(event.data);
            var user = data.user;
            const url = '{{ route('menu') }}/' + user.id;
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    var user = response.user;
                    console.log(response);
                    $.ajax({
                        type: "GET",
                        url: '{{ route('menu', ['user' => '']) }}' + user,
                        data: {user: user},
                        success: function (menuResponse) {
                            // Do something with the response
                            $('#content').html(data);
                        }
                    });
                }
            });
        }

        // evtSource.addEventListener("ping", (event) => {
        //     const newElement = document.createElement("li");
        //     const eventList = document.getElementById("list");
        //     const time = JSON.parse(event.data).time;
        //     newElement.textContent = `ping at ${time}`;
        //     eventList.appendChild(newElement);
        // });

    </script>
@endsection
