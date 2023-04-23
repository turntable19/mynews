@extends('layouts.admin')   // layouts/admin.blade.phpを継承する

@section('content') {{-- layouts/admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
    <div class="container">
        <div class="row justify-content-center">    
            <div class="col-md-8">  
                <div class="login-box card"> 

                {{-- __は、ヘルパ関数（viewで使うための関数）の一種で、翻訳文字列の取得として使われます。 --}}
                    <div class="login-header card-header mx-auto">{{ __('messages.login') }}</div>

                    <div class="login-body card-body">
                        <form method="POST" action="{{ route('login') }}"> {{-- route関数は、URLを生成したりリダイレクトしたりするための関数 --}}
                            @csrf {{-- CSRF対策のためのトークンを生成してくれる --}}

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('messages.email') }}</label>　

                                <div class="col-md-6"> {{-- ここは、col-sm-6にすると、画面が小さいときに、入力欄が縮んでしまう --}}
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    {{-- oldヘルパ関数は、セッションにフラッシュデータ（一時的にしか保存されないデータ）として入力されているデータを取得することができる --}}

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection