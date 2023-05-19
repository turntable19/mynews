@extends('layouts.admin')
@section('title', '登録済みプロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.profile.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.profile.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_name }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">氏名</th>
                                <th width="20%">趣味</th>
                                <th width="20%">自己紹介欄</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profiles)
                                <tr>
                                    <th>{{ $profiles->id }}</th>
                                    <td>{{ Str::limit($profiles->name, 100) }}</td>
                                    <td>{{ Str::limit($profiles->hobby, 250) }}</td>
                                    <td>{{ Str::limit($profiles->introduction, 250) }}</td>
                                    <td>
                                        <a href="{{ route('admin.profile.edit', ['id' => $profiles->id]) }}">編集</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.profile.delete', ['id' => $profiles->id]) }}">削除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection