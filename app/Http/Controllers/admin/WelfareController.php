<?php

namespace App\Http\Controllers\admin;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Model\Welfare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class WelfareController extends Controller
{
    protected $welfare;

    public function __construct(Welfare $welfare)
    {
        $this->welfare = $welfare;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'welfare_name' => 'required',
            'welfare_icon' => 'required',
        ],[
            "welfare_name.required"=>"Tên phúc lợi không được để trống",
            "welfare_icon.required"=>"Tên icon không được để trống",

        ]);
        if (!$validator->passes()) {

            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        $this->welfare->name_welfare = $request->welfare_name;
        $this->welfare->icon_welfare = $request->welfare_icon;
       if($this->welfare->save()){
           return response()->json([
               'message' => 'Thêm mới phúc lợi thành công',
               'status' => 200
           ]);
       }
       return response()->json([
        'message' => 'Thêm mới phúc lợi thất bại',
        'status' => 500
    ]);
    }

    public function update(Request $request,$id)
    {
        try {
            if(isset($id)){
                $validator = Validator::make($request->all(), [
                    'welfare_name' => 'required',
                    'welfare_icon' => 'required',
                ],[
                    "welfare_name.required"=>"Tên phúc lợi không được để trống",
                    "welfare_icon.required"=>"Tên icon không được để trống",

                ]);
                if (!$validator->passes()) {

                    return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
                }
                $itemWelfare = $this->welfare->find($id);
                $itemWelfare->name_welfare = $request->welfare_name;
                $itemWelfare->icon_welfare = $request->welfare_icon;
                if( $itemWelfare->save()){
                    return response()->json([
                        'message' => 'Cập nhật phúc lợi thành công',
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
        $welfare = $this->welfare->find($id);
        if($welfare){
            return response()->json([
                'data' => $welfare,
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
            $welfare = $this->welfare->find($id);
            $welfare->delete();
            return redirect()->back()->with("messageDelete","Xóa Thành Công");
        }

    }
}
