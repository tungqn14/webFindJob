<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    protected $career;
    public function __construct(Career $career)
    {
        $this->career = $career;
    }
    public function index()
    {
        $data = Career::latest()->paginate(10);
        return view("admin.career.index", compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'career_name' => 'required',
        ],[
            "career_name.required"=>"Tên nghành nghề không được để trống",
        ]);
        if (!$validator->passes()) {

            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        $this->career->name_career = $request->career_name;
        if($this->career->save()){
            return response()->json([
                'message' => 'Thêm mới nghành nghề thành công',
                'status' => 200
            ]);
        }
        return response()->json([
            'message' => 'Thêm mới nghành nghề thất bại',
            'status' => 500
        ]);
    }

    public function update(Request $request,$id)
    {
        try {
            if(isset($id)){
                $validator = Validator::make($request->all(), [
                    'career_name' => 'required',
                ],[
                    "career_name.required"=>"Tên nghành nghè không được để trống",
                ]);
                if (!$validator->passes()) {

                    return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
                }
                $itemCareer = $this->career->find($id);
                $itemCareer->name_career = $request->career_name;
                if( $itemCareer->save()){
                    return response()->json([
                        'message' => 'Cập nhật nghành nghè thành công',
                        'status' => 200
                    ]);
                }
                return response()->json([
                    'message' => 'Cập nhật phúc lợi thất bại',
                    'status' => 500
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'message' => 'Cập nhật phúc lợi thất bại',
                'status' => 500
            ]);
        }


    }
    public function edit(Request $request,$id)
    {
        $career = $this->career->find($id);
        if($career){
            return response()->json([
                'data' => $career,
                'status' => 200
            ]);
        }
        return response()->json([
            'message' => 'Lấy dữ liệu thất bại',
            'status' => 500
        ]);
    }

    public function delete($id)
    {
        if (isset($id)) {
            $career = $this->career->find($id);
            $career->delete();
            return redirect()->back()->with("messageDelete","Xóa Thành Công");
        }

    }
}
