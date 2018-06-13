@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @include('elements.left-profile')

            @include('elements.right-profile')

        </div>
    </div>
@endsection