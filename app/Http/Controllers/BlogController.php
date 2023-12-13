<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function Blogs()
    {

        $info_blogs = Blog::paginate(5)->withQueryString();

        return view('pages.blog', compact('info_blogs'));
    }

    public function AddBlog()
    {
        $all_blogs = Blog::latest()->get();

        return view('admin.blog.add_blog', compact('all_blogs'));
    }

    public function BlogStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blogs',
            'email' => '',
            'comment' => '',
            'title' => '',
            'description' => '',
            'image_blog' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',

        ]);
        $image_blog = $request->file('image_blog');
        $image_name_blog = hexdec(uniqid()).'.'.$image_blog->getClientOriginalExtension();
        $request->image_blog->move(public_path('images-blog'), $image_name_blog);
        $img_blog = 'images-blog/'.$image_name_blog;
        Blog::insert([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'title' => $request->title,
            'description' => $request->description,
            'image_blog' => $img_blog,
        ]);

        return redirect()->route('all_blogs')->with('message', 'Message Send  Successfully!');
    }

    public function Index()
    {
        $all_blogs = Blog::latest()->get();

        return view('admin.blog.blog_list', compact('all_blogs'));
    }

    public function EditBlogImg($id)
    {
        $blog_info = Blog::findorFail($id);

        return view('admin.blog.edit-blog-img', compact('blog_info'));
    }

    public function Blog_single($id)
    {
        $blog = Blog::findorFail($id);

        return view('blogs.show', compact('blog'));
    }

    public function UpdateBlogImg(Request $request)
    {
        $request->validate([
            'image_blog' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        $id = $request->id;
        $image_blog = $request->file('image_blog');
        $image_name_blog = hexdec(uniqid()).'.'.$image_blog->getClientOriginalExtension();
        $request->image_blog->move(public_path('images-blog'), $image_name_blog);
        $img_blog = 'images-blog/'.$image_name_blog;

        Blog::findorFail($id)->update([
            'image_blog' => $img_blog,
        ]);

        return redirect()->route('all_blogs')->with('message', 'Blog Image Updated Successfully!');

    }

    public function EditBlog($id)
    {
        $blog_info = Blog::findorFail($id);

        return view('admin.blog.editblog', compact('blog_info'));
    }

    public function UpdateBlog(Request $request)
    {
        $blog_info = $request->id;

        Blog::findorFail($blog_info)->update([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('all_blogs')->with('message', 'Blog Information Updated Successfully!');
    }

    public function DeleteBlog($id)
    {
        Blog::findorFail($id)->delete();

        return redirect()->route('all_blogs')->with('message', 'Blog Deleted  Successfully!');
    }
}
