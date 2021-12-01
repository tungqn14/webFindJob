<?php

namespace App\Http\Controllers\frontend;

use App\Helper\TraitShowData;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileSaveRequest;
use App\Http\Requests\ValidateChangePassword;
use App\Model\Skill;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    use TraitShowData;
    protected $user;
    protected $skill;
    public function __construct(User $user,Skill $skill)
    {
        $this->user = $user;
        $this->skill = $skill;
    }
    public function index(Request $request,$id)
    {
        $mySkill = array();
        $user = $this->user->find($id);
       foreach($user->skills as $skill){
          array_push($mySkill,$skill->pivot->skill_id);
       }
        $listSkills =  $this->skill->all();
        return view("frontend.profile.index",compact('listSkills','user','mySkill'));
    }
    public function save(ProfileSaveRequest $request,$id)
    {
        try {
            DB::beginTransaction();
            $avatarName = '';
            $cvName = '';
            if($request->hasFile('avatar') ){
                $avatar = $request->file('avatar');
                $avatarName = time().'.'.$avatar->getClientOriginalExtension();
                $avatar->move(public_path("frontend/image-profile"),$avatarName);
                $imgAvatarOld  = $request->avatarOld;
                if($imgAvatarOld){
                    if(\File::exists(public_path('frontend/image-profile/'.$imgAvatarOld))){

                        \File::delete(public_path('frontend/image-profile/'.$imgAvatarOld));

                    }
                }
            }
            if($request->hasFile('cv')){
                $cv = $request->file('cv');
                $cvName = time().'.'.$cv->getClientOriginalExtension();
                $cv->move(public_path("frontend/file-cv"),$cvName);
                $cvOld  = $request->cvOld;
                if($cvOld){
                    if(\File::exists(public_path('frontend/file-cv/'.$cvOld))){

                        \File::delete(public_path('frontend/file-cv/'.$cvOld));

                    }
                }
            }
            $user =  $this->user->find($id);
              if($user) {
                  $user->fullName = $request->fullName;
                  $user->email = $request->email;
                  $user->address = $request->address;
                  $user->phone = $request->phone;
                  $user->birthDay = date('d/m/Y',strtotime($request->birthDay));
                  $user->gender = $request->gender;
                  $user->exp = $request->exp;
                  $user->desiredMoney = $request->desiredMoney;
                  $user->rankUser = $request->education;
                  $user->typeTimeUser = $request->typeTime;
                  $user->descripYourself = $request->descripYourself;
                  $user->avatar = $avatarName ? asset("frontend/image-profile/".$avatarName) : $request->avatarOld;
                  $user->cv = $cvName ? asset("frontend/file-cv/".$cvName) : $request->cvOld;
                  $user->position = $request->position;
                  if ($request->skills) {
                      $user->skills()->sync($request->skills);
                  }
                  if ($user->save()) {
                      DB::commit();
                      return redirect()->back()->with("successUpdateProfile", "Cập nhật nhân thành công !!!");
                  }
                  return redirect()->back()->with("failUpdateProfile", "Cập nhật thất bại !!!");
              }
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error("".$exception->getMessage()." --Line: ".$exception->getLine());
            return redirect()->back()->with("failUpdateProfile","Cập nhật thất bại !!!");
        }

    }

}
