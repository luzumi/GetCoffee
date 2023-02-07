@extends('layouts.app')
@section('content')
    <div class="text-center">
        {{$viewData->username??'hallo'}}
    </div>

@endsection
