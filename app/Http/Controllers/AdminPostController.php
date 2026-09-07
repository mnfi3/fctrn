<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AdminPostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function index(){
        if(hasRole(Role::ADMIN)){
            $Posts = Post::paginate(10);
            return view('manager.post.index', compact('Posts'));
        }
        else{
            return redirect()->back();
        }
    }

    public function create()
    {
        if(hasRole(Role::ADMIN)){
        return view('manager.post.create');
        }
    }

    public function Store(Request $request)
    {

        if(hasRole(Role::ADMIN)){
        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/posts', $name);
            $photo = Media::create(['url'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $post = new Post([
            'photo_id' => $input['photo_id'],
            'slug' => $request->input('slug'),
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'preview' => $request->input('preview'),
            'content' => $request->input('content'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_description' => $request->input('meta_description'),
            'status' => $request->input('status'),
            'readtime' => $request->input('readtime'),
            'user_id' => Auth::user()->id
        ]);
        $post->save();
        return redirect()->route('posts.index')->with("success", "فرم ارسالی با موفقیت ثبت شد.");
        }
    }

    public function edit($id)
    {
        if(hasRole(Role::ADMIN)) {
            $Post = Post::find($id);
            return view('manager.post.edit', compact('Post'));
        }
    }

    public function update(Request $request)
    {
        if(hasRole(Role::ADMIN)){
            $Post = Post::find($request->id);
            $input['photo_id'] = $Post->photo_id;
            if ($file = $request->file('photo_id')){
                $name = time() . $file->getClientOriginalName();
                $file->move('images/posts', $name);
                $photo = Media::create(['url'=>$name]);
                $input['photo_id'] = $photo->id;
            }
            $Post->update([
                'photo_id' => $input['photo_id'],
                'slug' => $request->input('slug'),
                'title' => $request->input('title'),
                'category' => $request->input('category'),
                'preview' => $request->input('preview'),
                'content' => $request->input('content'),
                'meta_keywords' => $request->input('meta_keywords'),
                'meta_description' => $request->input('meta_description'),
                'status' => $request->input('status'),
                'readtime' => $request->input('readtime'),
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('posts.index')->with("success", "فرم ارسالی با موفقیت بروزرسانی شد.");
        }
    }

    public function delete($id)
    {
        if(hasRole(Role::ADMIN)) {
            $Post = Post::find($id);
            $Post->delete();
            return redirect()->route('posts.index')->with("success", "ردیف ارسالی با موفقیت حذف شد.");
        }
    }

}
