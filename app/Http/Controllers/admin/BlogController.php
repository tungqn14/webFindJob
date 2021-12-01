<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Model\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    protected $blog;
    public function __construct(Blogs $blog)
    {
        $this->blog = $blog;
    }
    public function index(){
        $blogs = $this->blog->latest()->paginate(10);
        return view("admin.blogs.index",compact("blogs"));
    }
    public function show(){
        return view("admin.blogs.show");
    }
    public function store(StoreBlogRequest $request){
        if($request->hasFile('theme') ){
            $theme = $request->file('theme');
            $themeName = time().'.'.$theme->getClientOriginalExtension();
            $pathTheme = Storage::putFileAs('ThemeBlog', $request->file('theme'), $themeName );

        }
        $this->blog->titleBlogs = $request->titleBlog;
        $this->blog->description = $request->desBlog;
        $this->blog->content = $request->contentBlog;
        $this->blog->images = $pathTheme;
        $this->blog->active = 0;
        if( $this->blog->save()){
            return redirect()->route("blog.index");
        }
        return redirect()->back();

    }

    public function edit(Request $request,$id){
      $blog = $this->blog->find($id);
      if($blog) {
          return view("admin.blogs.edit", compact("blog"));
      }
        return redirect()->back();
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'titleBlog' => 'required',
            'desBlog' => 'required',
            'contentBlog' => 'required',
        ],[
            "titleBlog.required" =>"Tiêu đề bài viết không được để trống",
            "desBlog.required" =>"Mô tả bài viết không được để trống",
            "contentBlog.required" =>"Nội dung bài viết không được để trống",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $blog = $this->blog->find($id);
        $themeName="";
        if($blog) {
            if($request->hasFile('theme') ){
                $theme = $request->file('theme');
                $themeName = time().'.'.$theme->getClientOriginalExtension();
                $theme->move(public_path("frontend/image-blog/"),$themeName);
                $imgThemeOld  = $request->themeOld;
                if($imgThemeOld){
                    if(\File::exists(public_path('frontend/image-blog/'.$imgThemeOld))){
                        \File::delete(public_path('frontend/image-blog/'.$imgThemeOld));
                    }
                }
            }
            $blog->titleBlogs = $request->titleBlog;
            $blog->description = $request->desBlog;
            $blog->content = $request->contentBlog;
            $blog->images = $themeName ? $themeName :  $request->themeOld;
            $blog->active = $request->active;
            if( $blog->save()){
                return redirect()->route("blog.index");
            }
            return redirect()->back();
        }
    }

    public function delete(Request $request,$id){
        if (isset($id)) {
            $blog = $this->blog->find($id);
            $blog->delete();
            return redirect()->back()->with("messageDelete","Xóa Thành Công");
        }

    }
}
