<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下の一行を追記することでProfile Modelが扱えるようになる
use App\Models\Profile;
use App\Models\Background;

use Carbon\Carbon;

class ProfileController extends Controller
{
    // 以下に追記
        public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        // laravel課題09記述
        // validationを行う 「::」->どういう意味?
        $this->validate($request, Profile::$rules);
        
        $profiles = new Profile;
        // Profile Modelからデータを取得する
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // データベースに保存する
        $profiles->fill($form);
        $profiles->save();
        
        return redirect('admin/profile/create');
    }
    
    public function index(Request $request){
        $cond_name = $request->cond_name;
        if ($cond_name != ''){
            // 検索されたら検索結果を取得する
            $posts = Profile::where('name', $cond_name)->get();
        } else{
            // それ以外は全てのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }

    public function edit(Request $request){
        
        // Profile Modelからデータを取得する
        $profiles = Profile::find($request->id);
        if (empty($profiles)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profiles_form' => $profiles]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profiles = Profile::find($request->id);
        // dd($profiles);
        // 送信されてきたフォームデータを格納する
        $profiles_form = $request->all();
        // dd($profiles_form);
        
        unset($profiles_form['_token']);

        // 該当するデータを上書きして保存する
        $profiles->fill($profiles_form)->save();
        
        $background = new Background();
        $background->profile_id = $profiles->id;
        $background->edited_at = Carbon::now();
        $background->save();

        return redirect('admin/profile');
    }
    
        public function delete(Request $request){
        // 該当するNews Modelを取得
        $profiles = Profile::find($request->id);
        // dd($profiles);
        
        // 削除する
        $profiles->delete();
        
        return redirect('admin/profile/');
    }
}