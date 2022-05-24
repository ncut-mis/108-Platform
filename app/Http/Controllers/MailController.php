<?php
namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller{

    public function send()
    {
        session_start();
        $data1=DB::table('exams')->where('staff_id',auth()->user()->id)->where('date',date("Y-m-d"))->where('start',$_SESSION['mail_open'])->get();
        foreach ($data1 as $dd)
        {
            $pid=$dd->product_id;
        }
        $product=DB::table('products')->where('id',$pid)->get();
        foreach ($product as $pp)
        {
            $sid=$pp->seller_id;
            $cid=$pp->category_id;
        }
        if($cid==1)//大衣
        {
            $web="https://meet.google.com/qvh-hqum-dvc";
        }
        else  if($cid==2)//鋼筆
        {
            $web="https://meet.google.com/kbn-dqif-mku";
        }
        else   if($cid==3)//書籍
        {
            $web="https://meet.google.com/hof-hvzr-ykt";
        }
        else   if($cid==4)//專輯
        {
            $web="https://meet.google.com/zmy-tzzm-bxs";
        }
        $seller=DB::table('users')->where('id',$sid)->get();
        $s_mail='';
        foreach ($seller as $ss)
        {
            $s_name=$ss->name;
            $s_mail=$ss->email;

        }

        $name=$s_name;
        $content="感謝您預約本平台的二手物檢測服務 <br>離檢測開始時間還有15分鐘<br>請透過下方連結準時進入會議室喔!<br>".$web;
        $data = ['name' => $name, 'content'=> $content, ];
        Mail::send('emails.post', $data, function($message) use ($name, $s_mail) {
            $message->subject('Hand-me-down');
            $message->to($s_mail, $name);
            $message->from('abc@ncut.edu.tw', 'Hand-me-down');
        });
        return redirect()->route('staffhome.index');


    }



}
