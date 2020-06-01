<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Comment;
use App\Post;
use App\Video;
class CategoryController extends Controller{

    public function allCategory(){
        return Category::all();
    }
    public function allComment(){
        return Post::with('comments')->get();
    }
    public function storeCategory(Request $request){
        $data = $request->all();
        return Category::create($data);
    }
    public function updateCategory(Request $request){
        $data = $request->all();
        \Log::info($data);
        return Category::where('id',$data['id'])->update($data);
    }
    public function deleteCategory(Request $request){
        $data = $request->all();
        return Category::where('id',$data['id'])->delete();
    }



    public function allUser(){
        // return User::all();
        return User::with('phone')->get();
    }
}
