@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの編集</h2>
                <!-- ここ考える -->
                <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <!-- $eを順番に表示-->
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profiles_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <select name="gender">
	                            <option value="men">男性</option>
	                            <option value="women">女性</option>
	                            <option value="others">その他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby"  value="{{ $profiles_form->hobby }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $profiles_form->introduction}}</textarea>
                        </div>
                    </div>
                    <!--一行下のinput文抜けてたから更新ボタン押してもデータが拾ってこれなかった-->
                    <input type="hidden" name="id" value="{{ $profiles_form->id }}">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
                
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profiles_form->backgrounds != NULL)
                                @foreach ($profiles_form->backgrounds as $background)
                                    <li class="list-group-item">{{ $background->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection