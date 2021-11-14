<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    protected $skill;

    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tech_name' => 'required',
        ],[
            "tech_name.required"=>"Tên công nghệ không được để trống",
        ]);
        if (!$validator->passes()) {

            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }

        $this->skill->nameSkill = $request->tech_name;

        if($this->skill->save()){
            return response()->json([
                'message' => 'Thêm mới công nghệ thành công',
                'status' => 200
            ]);
        }
        return response()->json([
            'message' => 'Thêm mới công nghệ thất bại',
            'status' => 500
        ]);
    }

    public function update(Request $request,$id)
    {
        try {
            if(isset($id)){
                $validator = Validator::make($request->all(), [
                    'tech_name' => 'required',
                ],[
                    "tech_name.required"=>"Tên công nghệ không được để trống",
                ]);
                if (!$validator->passes()) {
                    return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
                }
                $itemTech = $this->skill->find($id);
                $itemTech->nameSkill = $request->tech_name;
                if( $itemTech->save()){
                    return response()->json([
                        'message' => 'Cập công nghệ thành công',
                        'status' => 200
                    ]);
                }
                return response()->json([
                    'message' => 'Cập nhật công nghệ thất bại',
                    'status' => 500
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'message' => 'Cập nhật công nghệ thất bại',
                'status' => 500
            ]);
        }

    }
    public function edit(Request $request,$id)
    {
        $tech = $this->skill->find($id);
        if($tech){
            return response()->json([
                'data' => $tech,
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
            $skill = $this->skill->find($id);
            $skill->delete();
            return redirect()->back()->with("messageDelete","Xóa Thành Công");
        }

    }
}
