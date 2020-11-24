<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create(){

        return view('posts.create')->with('categories',Category::all());

    }


    public function index(){
        return view('posts.index')->with('posts',Post::all());
    }

    public function store(CreatePostsRequest $request){

        $image =  $request->image->store('posts');

        Post::create([
            'title'=> $request->title,
            "description"=> $request->description,
            'content'=> $request->content,
            'image'=>$image,
            'category_id'=>$request->category

        ]);
        session()->flash('success','Post Created Successfully');
        return redirect(route('posts.index'));
    }



    public function trashed(){
        $trashed = Post::withTrashed()->get::all();
        return view('posts.index')->with('posts',$trashed);
    }

    public function edit(Post $post){
        return view('posts.create')->with('post',$post);
    }

    public function update(UpdatePostRequest $request,Post $post){
        $data = $request->only('title','description','content');


        if ($request->hasFile('image')){
            //updated image
            $image = $request->image->store('posts');
            //delete old image
            $post->deleteImage();

            $data['image'] = $image;
        }
        $post->update($data);

        session()->flash('success','Post Updated Successfully');
        return redirect(route('posts.index'));
    }
    public function destroy(Post $post){
//      $post = Post::withTrashed()->where('id',$id)->firstOrFail();
//        if($post->trashed()){
            $post->delete();
//           $post->deleteImage();
//            $post->forceDelete();
//       }else{
//            $post->delete();
//        }

       session()->flash('success','Post deleted successfully');
        return redirect(route('posts.index'));
    }
}
