<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\RecursiCategory;
use App\Http\Requests\AdminCategoryRequest;
use App\Model\Categories;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
//        if( $request->parent_id == 0){
//            if(empty($request->imgCareer)){
//                return redirect()->back()->with('alert', 'Bạn cần tải ảnh cho danh mục cha');
//            }
//            $image = $request->file('imgCareer');
//            $newImageName = time().'.'.$image->getClientOriginalExtension();
//            $image->move(public_path("admin/images"),$newImageName);
//            $this->career->imgCareer = $newImageName;
//        }
//    //  $menu = new RecursiCategory($dataMenu);
//       // $htmlOption = $menu->recursiveMenu($parentId='');
    // $this->career->active = $request->active;
//if (isset($id)) {
//$career = $this->career->find($id);
//$image = $career['imgCareer'];
//$fileImage = public_path()."\admin\images\\".$image;
//if($image){
//\File::delete($fileImage);
//}
//$career->delete();
//return redirect()->back()->with("messageDelete","Xóa Thành Công");
//}
    public function __construct(Categories $categories)
    {
        $this->category = $categories;
    }
    public function index()
    {
       $data = Categories::latest()->paginate(5);
        return view("admin.career.index", compact('data'));
    }

    public function show()
    {
        return view("admin.career.show");
    }

    public function store(AdminCategoryRequest $request)
    {
        $this->category->name = $request->c_name;
        $this->category->save();
        return redirect()->route("career.index");
    }

    public function update(AdminCategoryRequest $request,$id)
    {
        try {
            if(isset($id)){
                $itemMenu = $this->category->find($id);
                $itemMenu->tenLinhVuc = $request->c_name;
                $itemMenu->save();
                return redirect()->route("career.index");
            }
        }catch (\Exception $exception){
            return redirect()->back()->with("warning","Lỗi Cập nhật !!!");
        }


    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        return view("admin.career.edit", compact( 'category'));
    }

    public function delete($id)
    {
        if (isset($id)) {
            $category = $this->category->find($id);
            $category->delete();
            return redirect()->back()->with("messageDelete","Xóa Thành Công");
        }

    }
}
