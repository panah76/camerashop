<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function add_news_pro()
    {
        return view("admin.news.add");
    }

    public function add_news_check(Request $request)
    {
        $title=$request->title;
        $image=$request->image;
        $category=$request->category;
        $description=$request->description;
        if (isset($image))
        {
        $image_size=$image->getSize()/1024;
        if ($image_size>1024)
        {
            Session::flash("error_massage", "Please Select Image Max 1 Mb");
            return redirect()->back();
        }
        }
        else{
           $image_extension=$image->getClientOriginalExtension();
           $extension_array=array("jpg","png");
           if (in_array($image_extension,$extension_array))
           {
               $image_name=$image->getClientOriginalName();
               $image->move("pro_images","$image_name");
           }
        }
    }

    public function login_check(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $this->validate(request(), ["username" => "required", "password" => "required"]);
        $admin_count = Admin::where(["email" => $username, "password" => $password])->count();

        if ($admin_count) {
            $admin = Admin::where(["email" => $username, "password" => $password])->first();
            Session::put("admin_id", $admin->id);
            echo $admin;
            return redirect("admin/panel");
        } else {
            Session::flash("massage", "User or Pass Incorrect!");
            return redirect()->back();
        }
    }

    public function panel()
    {
//        if (Session::has("admin_id")) ;
        return view("admin/panel");


//    else
//        {
//            return redirect('login');
//        }
    }
}
