<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        //投稿日時順に新しい方から並べる
        $posts = News::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            //配列の最初のデータを削除し、その値を返すメソッド
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}