@extends('layouts.app')
@section('content')
    <div id="content" class="text-center">
        {{$viewData??'hallo'}}
    </div>
    <a href="{{ route('turn_on') }}" class="btn btn-primary">Turn On</a>
    <a href="{{ route('turn_off') }}" class="btn btn-primary">Turn Off</a>
    <a href="{{ route('reset-user-id') }}" class="btn btn-primary">Reset User ID</a>

@endsection
