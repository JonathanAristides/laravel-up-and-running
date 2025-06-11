@extends('layouts.app')

@section('content')
    {{--#21--}}
    Usercount: {{$userCount}}


    <h1>Your Tasks</h1>
    <ul>
        {{--        #10--}}
        @each('tasks._task', $dummyTasks, 'task')
    </ul>
@endsection
