<?php

namespace App\Http\Controllers;
use App\Product;
use App\Supplier;
use App\Country;
use App\ProductTag;
use App\Post;
use App\Video;
use App\Tag;
use App\User;
use App\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all_product () {
        return Product::with('category','tag')->get();
    }
    public function one_to_one () {
        return User::with('phone')->get();
    }
    public function all_post () {
        return Post::with('tags')->get();
    }
    public function tag_post () {
        return Tag::with('posts')->get();
    }
    public function tag_video () {
        return Tag::with('videos')->get();
    }
    public function all_video () {
        return Video::with('tags')->get();
    }
    public function all_tag () {
        return Tag::with('posts','videos')->get();
    }
    public function allsupplier () {
        return Supplier::with('userHistory')->get();
    }
    public function allCountry () {
        return Country::with('posts')->get();
    }
    public function allimage () {
        return Post::with('image')->get();
    }
    public function show_product ($id) {
        return Product::where('id',$id)->first();
    }
    public function storeProduct(Request $request){
        $data = $request->all();
        $tags = $data['tags'];
        unset($data['tags']);
        $product =  Product::create($data);
        $product_tags = [];
        if(sizeof($tags)>0){
            foreach ($tags as  $value) {
                $ob = [];
                $ob['product_id'] = $product->id;
                $ob['tag_id'] = $value;
                array_push($product_tags,$ob);
            }
            ProductTag::insert($product_tags);

        }

        return $product;

    }
    public function updateProduct(Request $request){
        $data = $request->all();
        \Log::info($data);
        return Product::where('id',$data['id'])->update($data);
    }
    public function delete_Product(Request $request){
        $data = $request->all();
        return Product::where('id',$data['id'])->delete();
    }
}
