<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function fileManager(){
        $files = File::orderBy('id', 'desc')->paginate(50);
        return view('manager.file-manager', compact('files'));
    }

    public function fileInsert(Request $request){
        $file = File::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'path' => uploadFile($request->file('file')),
        ]);

        return back()->with('success', '1');
    }

    public function fileRemove($id){
        $file = File::find($id);
        $file->delete();
        return back();
    }
}
