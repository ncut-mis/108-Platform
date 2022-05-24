<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PerWeekSchedule;
use App\Models\Post;
use App\Models\QualityItem;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        if(\Illuminate\Support\Facades\Auth::check())
        {
            $month = date("n");
            session_start();
            $data = Seller::where('status',0)->get();
            $data2 = PerWeekSchedule::where('month',$month)->where('staff_id',null)->get();
            $_SESSION['apply_status']=$data;
            $_SESSION['schedule_status']=$data2;
            $t2 = PerWeekSchedule::where('month',$month-1)->delete();//自動刪除前一個月的班表
            if(auth()->user()->job=='管理者')
            {
                $post = Post::get();
                $data = ['posts' => $post];
                return view('adminhome', $data);
            }
            else
            {

                return redirect()->route('staffhome.index');
            }
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function show_post($id)
    {
        $month = date("n");
        session_start();
        $data = Seller::where('status',0)->get();
        $data2 = PerWeekSchedule::where('month',$month)->where('staff_id',null)->get();
        $_SESSION['apply_status']=$data;
        $_SESSION['schedule_status']=$data2;

        $posts = Post::where('id','=',$id)->first();
        $data2 = ['post1' => $posts];
        return view('adminhome', $data2);
    }

    public function category_maintain()
    {
        $category = Category::orderby('status','DESC')->get();
        $data = ['categories' => $category];

        if(isset($_GET['status']))
        {
            if($_GET['status'] == 1)
                $status = 1;
            else
                $status = 0;
        }

        if(isset($_GET['new_category']))
        {
            Category::insert(['name'=>$_GET['new_category'], 'status'=>$status, 'disable'=>0]);
            echo "<script >alert('新增成功'); location.href ='/category_maintain';</script>";//重整頁面新增資料顯現
        }

        return view('category_maintain',$data);
    }

    public function update_category()
    {
        Category::where('id','=',$_GET['id'])
        ->update(['status'=>$_GET['status1']]);
        return redirect()->route('adminhome.category_maintain');
    }

    public function disable_category($id)
    {
        Category::where('id','=',$id)->update(['disable'=>'1']);
        return redirect()->route('adminhome.category_maintain');
    }

    public function able_category($id)
    {
        Category::where('id','=',$id)->update(['disable'=>'0']);
        return redirect()->route('adminhome.category_maintain');
    }

    public function show($id)
    {
        $item_name= Category::where('id','=',$id)->first();
        $item = QualityItem::
        join('categories','quality_items.category_id','=','categories.id')
            ->orderby('extra','ASC')
            ->where('quality_items.category_id','=',$id)
            ->select('categories.name','quality_items.category_id','quality_items.id','quality_items.content','quality_items.extra')
            ->get();

        if(isset($_GET['extra']))
        {
            if($_GET['extra'] == 1)
                $extra = 1;
            else
                $extra = 0;
        }

        if(isset($id) && isset($_GET['new_item']))
        {
            QualityItem::insert(['category_id'=>$id, 'content'=>$_GET['new_item'], 'extra'=>$extra]);
            Category::where('id','=',$id)->update(['status'=>'1']);
            echo "<script >alert('新增成功'); location.href ='/category_item/".$id."';</script>";//重整頁面新增資料顯現
        }

        $data = ['name' => $item_name];
        $data2 = ['items' => $item];
        return view('item_maintain',$data, $data2);
    }

    public function update_item()
    {
        if(isset($_GET['extra1']))
            QualityItem::where('id','=',$_GET['id'])->update(['content'=>$_GET['content'],'extra'=>$_GET['extra1']]);
        return redirect()->route('adminhome.show',$_GET['category_id']);
    }

    public function delete_item($id)
    {
        QualityItem::destroy($id);
        $cid = QualityItem::where('category_id','=',$_GET['category_id'])->get();
        if(count($cid)==0)
            Category::where('id','=',$_GET['category_id'])->update(['status'=>'0']);
        return redirect()->route('adminhome.show',$_GET['category_id']);
    }
}
