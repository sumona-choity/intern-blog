<?php

namespace App\Http\Controllers;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function allTag(){
        return Tag::all();
    }
    public function storeTag(Request $request){
        $data = $request->all();
        return Tag::create($data);
    }
    public function updateTag(Request $request){
        $data = $request->all();
        \Log::info($data);
        return Tag::where('id',$data['id'])->update($data);
    }
    public function deleteTag(Request $request){
        $data = $request->all();
        return Tag::where('id',$data['id'])->delete();
    }
}
