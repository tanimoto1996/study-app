@extends('layouts.app')

@section('content')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
<div class="topWrapper">
    <div class="topImg mt-5">
        <h1 class="imgText">学習アプリで<br>簡単にスケジュール管理<br><span class="tagline-title">「ガクシュウ」</span></h1> 

        <div class="topButtonContainer">
            <a href="{{ url('/Top') }}"><button class="btn btn-primary mr-2">学習を始める</button></a>
            <button class="btn btn-success">概要をみる</button>
        </div>
    </div> 

</div>
@endsection