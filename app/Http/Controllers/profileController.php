<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\profile;

class profileController extends Controller
{
    public function index(Request $request)
    {
        $posts = profile::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
}