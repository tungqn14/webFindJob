<?php

namespace App\Http\Controllers\frontend\manageRecruiment;

use App\Http\Controllers\Controller;
use App\Model\CvSubmit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManageCvSubmitController extends Controller
{
    protected $cvSubmit;
    public function __construct(CvSubmit $cvSubmit)
    {
        $this->cvSubmit = $cvSubmit;
    }

    public function index(Request $request){
       return view("frontend.recruiments.manageSubmit.index");
    }
    public function acceptCV(Request $request){

        $insCV = $this->cvSubmit->find($request->idCV);
        if($insCV){
            $insCV->active = $request->active;
            if($insCV->save()){
                return redirect()->back()->with("messAcceptCVsuccess","Phê duyệt thành công !");
            }
            return redirect()->back()->with("messAcceptCVerr","Phê duyệt thất bại !");
        }
        return redirect()->back()->with("messAcceptCVerr","Phê duyệt thất bại !");

    }
}
