@extends('layouts.app')

@section('content')
<link href="{{ asset('css/note.css') }}" rel="stylesheet">
<div class="mainWrap">
    @include('sideber')
    <div class="noteContent">
        <div class="formWrap">
            <form action="" method="POST">
                <div class="formMemoTitleWrap mb-3">
                    <label for="memoTitle" class="form-label">タイトル</label>
                    <input type="text" id="memoTitle" placeholder="例）○○○について" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="memoText" class="form-label">メモ</label>
                    <textarea id="memoText" rows="10" class="form-control"></textarea>
                </div>

                <div class="submit">
                    <button type="button" class="btn btn-success">メモする</button>
                </div>
            </form>
        </div>
        <div class="noteTable">
            <div class="searchWrap">
                <form method="get" action="#" class="searchContainer">
                    <input type="text" class="searchTxet" size="25" placeholder="キーワード検索">
                    <input type="submit" value="検索">
                </form>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">日付</th>
                        <th scope="col">タイトル</th>
                        <th scope="col">内容</th>
                        <th scope="col">編集</th>
                        <th scope="col">削除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">3/27</th>
                        <td class="title">AWSの環境構築</td>
                        <td>AWSの環境構築手順を記載していく。○○○が〇〇でとても大変である</td>
                        <td class="edit">編集</td>
                        <td class="delete">削除</td>
                    </tr>
                    <tr>
                        <th scope="row">3/27</th>
                        <td class="title">AWSの環境構築</td>
                        <td>AWSの環境構築手順を記載していく。○○○が〇〇でとても大変である</td>
                        <td class="delete">削除</td>
                    </tr>
                    <tr>
                        <th scope="row">3/27</th>
                        <td class="title">AWSの環境構築</td>
                        <td>AWSの環境構築手順を記載していく。○○○が〇〇でとても大変である</td>
                        <td class="edit">編集</td>
                        <td class="delete">削除</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection