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

    public function show_item($id)
    {
        //固定公布檢測項目的公告
        $post2 = Post::where('id','=','4')->first();
        $data3 = ['post2' => $post2];

        if(isset($_GET['category_id']))
        {
            $quality=QualityItem::where('category_id','=',$_GET['category_id'])->get();
        }
        $data4 = ['quality' => $quality];
        return view('posts',$data3,$data4);
    }

    public function update_post($id)
    {
        $post3 = Post::where('id','=',$id)->first();
        $data3 = ['post3' => $post3];

        if(isset($_GET['for']))
        {
            Post::where('id','=',$id)->update(['date'=>$_GET['date'],'title'=>$_GET['title'],'content'=>$_GET['content'],'for'=>$_GET['for']]);
            echo "<script >alert('修改成功'); location.href ='/posts/".$id."';</script>";
        }
        return view('update_post',$data3);
    }

    public function delete_post($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }

    public function create_post()
    {
        $post4 = Post::get();
        $data4 = ['post4' => $post4];

        if(isset($_GET['date']) && isset($_GET['title']) && isset($_GET['content']) && isset($_GET['for']))
        {
            Post::insert(['date'=>$_GET['date'],'title'=>$_GET['title'],'content'=>$_GET['content'],'for'=>$_GET['for']]);
            echo "<script >alert('新增成功'); location.href ='/posts';</script>";
        }
        return view('create_post',$data4);
        /*return view('posts');*/
    }

}
