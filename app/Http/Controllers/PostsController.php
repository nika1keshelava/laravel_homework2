<?php

namespace App\Http\Controllers;

use App\PostsModel;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }


    public function allPosts(){

        return view('add-posts', [
            'posts' => PostsModel::all()
        ]);
    }


    public function savePost(Request $request){

        PostsModel::create([
            'post'=> $request->post('post'),
            'postCreatedAt'=> $request->post('postCreatedAt'),
        ]);

        return redirect('/posts');
    }


    public function updatePosts(Request $request){


        if(PostsModel::where('id',$request->post('id'))->count() == 0){

            echo 'Result not found';

        }else{

            PostsModel::where('id',$request->post('id'))->update([
                'post'=> $request->post('post'),
                'postCreatedAt'=> $request->post('postCreatedAt'),
            ]);

            return redirect('/posts');
        }


    }


    public function editPost($id){

        return view('add-posts', [
            'posts' => PostsModel::all(),
            'edit_post' => PostsModel::where('id',$id)->first(),
        ]);
    }

    public function deletePost($id){

        if(PostsModel::where('id',$id)->count() == 0){

            echo 'Post not found';

        }else{

            PostsModel::where('id',$id)->delete();
            return redirect('/posts');
        }

    }
}
