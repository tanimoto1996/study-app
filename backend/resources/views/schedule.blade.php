@extends('layouts.app')

@section('content')
<link href="{{ asset('css/schedule.css') }}" rel="stylesheet">
<meta name="user-id" content="{{ Auth::user()->id }}">
<div class="mainWrap">
    @include('sideber')
    <cakendar-component></cakendar-component>
</div>
@endsection