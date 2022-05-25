<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\QualityItem;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post1 = Post::get();
        $data = ['post1' => $post1];
        return view('posts',$data);
    }

    public function show_post($id)
    {
        $post2 = Post::where('id','=',$id)->first();
        $data2 = ['post2' => $post2];
        return view('posts',$data2);
    }

    public function update_post($id)
    {
        $post3 = Post::where('id','=',$id)->first();
        $data3 = ['post3' => $post3];;

        if(isset($_GET['for']))
        {
            Post::where('id','=',$id)->update(['date'=>$_GET['date'],'title'=>$_GET['title'],'content'=>$_GET['content'],'for'=>$_GET['for']]);
            echo "<script >alert('修改成功'); location.href ='/posts/".$id."';</script>";
        }


        return view('update_post',$data3);
    }

    
}
