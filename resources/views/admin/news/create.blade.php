@extends('layouts.admin')
@section('title', 'ニュースの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成</h2>
                <form action="{{ route('admin.news.create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0) {{-- countメソッドは配列の個数を返すメソッド --}}
                        <ul>
                            @foreach($errors->all() as $e) {{-- allメソッドはバリデーションエラーの配列を返すメソッド --}}
                                <li>{{ $e }}</li> {{-- $eは$errorsの配列の中身 --}}
                            @endforeach
                        </ul>
                    @endif {{-- エラーがある場合は、エラーを表示する --}}
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"> {{-- oldメソッドは、前回のリクエストの値を返すメソッド --}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection