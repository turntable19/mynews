<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
       // if (isset($form['image'])) {
           // $path = $request->file('image')->store('public/image');
           // $profile->image_path = basename($path);
      //  } else {
            //$profile->image_path = null;
       // }
       // unset($form['_token']);
       // unset($form['image']);

       // $profile->fill($form);
       // $profile->save();

        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
