<?php

namespace App\Http\Controllers\frontend\manageRecruiment;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Model\Company;
use App\Model\User;
use Illuminate\Http\Request;

class ManageAccountController extends Controller
{
    protected $user;
    protected $company;

    public function __construct(User $user,Company $company)
    {
    $this->user = $user;
    }
    public function storeAccount(StoreAccountRequest $request,$idUser){
        $user = $this->user->find($idUser);
        if($user){
            $user->fullName = $request->fullName;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone;
            if($user->save()){
                return redirect()->back()->with("alertSuccessStoreProfile","Lưu thông tin tài khoản thành công");
            }
            return redirect()->back()->with("alertErrorStoreProfile","Lưu thông tin tài khoản thất bại");
        }
        return redirect()->back()->with("alertErrorStoreProfile","Lỗi không tìm thấy người dùng cần lưu");
    }

    public function storeCompany(Request $request,$id){
        $logoName = '';
        $user = $this->user->find($id);
        if($request->hasFile('logo') ){
            $logo = $request->file('logo');
            $logoName = time().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path("frontend/image-recruiment-logo/"),$logoName);
        }
        $dataCompany = [
            'nameCompany'=> $request->nameCompany,
            'officeAddress'=> $request->officeAddress,
            'logo'=> $logoName ?  asset("frontend/image-recruiment-logo/".$logoName) : $request->logo_old,
            'aboutCompany'=> $request->aboutCompany ? $request->aboutCompany : $request->aboutCompanyOld,
            'welfare_id'=> $request->id_welfare,
            'career_id'=> $request->id_career,
            'website'=> $request->website ? $request->website : "null",
            'scale'=> $request->scale,
        ];
        $company =  $user->company()->update($dataCompany);
        if($company){
            return redirect()->back()->with("alertSuccessStoreProfile","Lưu thông tin công ty thành công");
        }
        return redirect()->back()->with("alertErrorStoreProfile","Lưu thông tin công ty thất bại");
    }
}
