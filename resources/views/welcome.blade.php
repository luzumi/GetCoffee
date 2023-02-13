@extends('layouts.app')
@section('content')
    <div id="content" class="text-center">
        {{$viewData??'RFID-Card auflegen'}}
    </div>
{{--        <video id="myVideo" loop autoplay width="100%" height="auto" class="block" >--}}
{{--            <source src="/storage/media/juicy%20vapor,%20in%20the%20style%20of%203D%20Rendering(1).mp4" type="video/mp4">--}}
{{--            Your browser does not support the video tag.--}}
{{--        </video>--}}


    <script>
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "{{ route('send-request-to-rasp') }}");
        xhr.setRequestHeader("x-requested-with", "XMLHttpRequest");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                let responseText = xhr.responseText;
                if (responseText.startsWith("data:")) {
                    responseText = responseText.substring(5);
                }
                let data = JSON.parse(responseText);
                console.log(data)
                if (data.user == null) {
                    // Wiederhole den Request, wenn kein Benutzer gefunden wurde
                    xhr.open("GET", "{{ route('send-request-to-rasp') }}");
                    xhr.setRequestHeader("x-requested-with", "XMLHttpRequest");
                    xhr.send();
                } else {
                    let user = data.user;
                    let userId = user.id;
                    console.log(data)
                    window.location.href = '/menu/' + userId;
                }
            }
        };

        xhr.send();
    </script>
@endsection
