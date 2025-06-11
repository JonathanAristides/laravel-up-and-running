{{--#6--}}
@extends('layouts.app')

{{--#5 & #7--}}
@section('content')
    {{--    #1--}}
    <h1>Hello, {{ $testVariable }}</h1>

    {{--        #24--}}
    {{$user['name']}}
    @datetime($user['created_at'])
    <br>
    <br>
    {{--    #25--}}
    @badge('error badge', 'red')
    <br>
    <br>


    {{--    #26--}}
    @userIdIsEven
    <p>Only Users with Even Id can see this.</p>
    @enduserIdIsEven



    {{--    #2--}}
    @if($testBoolean)
        TestBolean is true
    @else
        TestBolean is false
    @endif


    {{--    #3--}}
    @unless($testBoolean)
        TestBolean is false
    @endunless


    {{--    #4--}}
    <ul>
        @foreach($testArrayOfObjects as $item)
            <li>{{ $item->name }} --- {{ $item ->value }}</li>
        @endforeach
    </ul>



    {{--    #12--}}
    <x-alert type="error" message="Error Message"/>



    {{--    #13 & #14--}}
    <x-alert class="test" type="success">
        <p>Passing data via slot</p>
    </x-alert>
@endsection


{{--    #8--}}
@section('scripts')
    @parent
    <script>
        console.log('This is a script from index.blade.php');
    </script>
@endsection

{{--#17--}}
@push('styles')
    <style>
        body {
            background-color: #d7e1c5;
        }
    </style>
@endpush

@push('scripts')
    {{--    @vite(['resources/js/app.js'])--}}
@endpush
