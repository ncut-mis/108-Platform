<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PerWeekSchedule;
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
            //$data = DB::table('sellers')->where('status',0)->get();
            $data = Seller::where('status',0)->get();
            //$data2=DB::table('per_week_schedules')->where('month',$month)->where('staff_id',null)->get();
            $data2 = PerWeekSchedule::where('month',$month)->where('staff_id',null)->get();
            $_SESSION['apply_status']=$data;
            $_SESSION['schedule_status']=$data2;
            $t2 = PerWeekSchedule::where('month',$month-1)->delete();//自動刪除前一個月的班表
            if(auth()->user()->job=='管理者')
            {
                return view('adminhome');
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

    public function category_maintain()
    {
        $category = Category::get();
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
            Category::insert(['name'=>$_GET['new_category'], 'status'=>$status]);
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

    public function delete_category($id)
    {
        Category::destroy($id);
        return redirect()->route('adminhome.category_maintain');
    }

    public function item_maintain()
    {
        //status=1，有品質檢定
        $categories=Category::
            where('status','=','1')
            ->get();
        $item = QualityItem::
        join('categories','quality_items.category_id','=','categories.id')
        ->select('categories.name','quality_items.category_id','quality_items.id','quality_items.content','quality_items.extra')
        ->get();
        $data = ['categories' => $categories];
        $data2 = ['items' => $item];

        if(isset($_GET['extra']))
        {
            if($_GET['extra'] == 1)
                $extra = 1;
            else
                $extra = 0;
        }

        if(isset($_GET['category']) && isset($_GET['new_item']))
        {
            QualityItem::insert(['category_id'=>$_GET['category'], 'content'=>$_GET['new_item'], 'extra'=>$extra]);
            Category::where('id','=',$_GET['category'])->update(['status'=>'1']);
            echo "<script >alert('新增成功'); location.href ='/item_maintain';</script>";//重整頁面新增資料顯現
        }

        return view('item_maintain',$data,$data2);
    }

    public function update_item()
    {
        QualityItem::where('id','=',$_GET['id'])->update(['content'=>$_GET['content'],'extra'=>$_GET['extra1']]);
        return redirect()->route('adminhome.item_maintain');
    }

    public function delete_item($id)
    {
        QualityItem::destroy($id);
        $cid = QualityItem::where('category_id','=',$_GET['category_id'])->get();
        if(count($cid)==0)
            Category::where('id','=',$_GET['category_id'])->update(['status'=>'0']);
        return redirect()->route('adminhome.item_maintain');
    }
}
