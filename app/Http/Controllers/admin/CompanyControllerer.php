<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Posts;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyControllerer extends Controller
{
    protected $company;
    protected $user;
    protected $post;

    public function __construct(Company $company,User $user,Posts $post)
    {
        $this->company = $company;
        $this->user = $user;
        $this->post = $post;
    }
    public function index()
    {
        $listCompany = $this->company->withCount("favorites")->orderByDesc("favorites_count")->get();

        //dd($listCompany);
        foreach ($listCompany as $item){
            if($item->favorites_count >= 3 ){
                $item->vip = 1;
            }else{
                $item->vip = 0;
            }
            $item->save();
        }
     $company = $this->company->withCount("favorites")->orderByDesc("favorites_count")->paginate(15);
     return view("admin.company.index", compact("company"));
    }

    public function promotion(Request $request,$id)
    {
        try {
            if(isset($id)){
                $company = $this->company->find($id);
                $company->vip = $request->vip;
                if( $company->save()){
                    return response()->json([
                        'message' => 'Thăng hạng thành công',
                        'status' => 200
                    ]);
                }
                return response()->json([
                    'message' => 'Thăng hạng thất bại',
                    'status' => 500
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'message' => 'Thăng hạng thất bại',
                'status' => 500
            ]);
        }


    }

    public function edit(Request $request,$id)
    {
        $company = $this->company->find($id);
        if($company){
            return response()->json([
                'data' => $company,
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
        try {
            DB::beginTransaction();
            if (isset($id)) {
                $company = $this->company->with("userPost","users")->find($id);
                foreach ($company->userPost as $item){
                    $this->post->find($item->id_post)->delete();
                }
                foreach ($company->users as $item){
                    $this->user->find($item->id)->delete();
                }
                $company->delete();
                DB::commit();
                return redirect()->back()->with("messageDelete","Xóa Thành Công");
            }
        }catch (\Exception $exception){
            DB::rollBack();
            abort(403);
            return back()->withError($exception->getMessage());
        }


    }
}
