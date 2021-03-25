@extends('layouts.app')

@section('content')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
<div class="mainWrap">
    @include('sideber')
    <div class="topContent">
        <div class="comprehensive">
            <div class="col-sm-6">
                <div class="card ml-5 mt-5">
                    <div class="card-body">
                        <h5 class="card-title">TODO</h5>
                        <div class="todoList">                  
                            <p class="card-text">・勉強</p>
                            <p class="card-text">・寝る</p>
                            <p class="card-text">・買い物</p>
                        </div>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card mr-5 mt-5">
                    <div class="card-body">
                        <h5 class="card-title">スケジュール</h5>
                        <div class="scheduleList">                  
                            <p class="card-text">・勉強</p>
                            <p class="card-text">・寝る</p>
                            <p class="card-text">・買い物</p>
                        </div>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="graph">
            ここに学習時間のグラフ
        </div>
    </div>
</div>
@endsection