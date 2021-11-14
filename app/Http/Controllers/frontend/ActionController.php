<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Model\Blogs;
use App\Model\Company;
use App\Model\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Doctrine\Common\Cache\Psr6\get;

class ActionController extends Controller
{
   protected $favorite;
   protected $company;
   protected $blog;
    public function __construct(Favorite $favorite,Company $company,Blogs $blog)
    {
        $this->favorite = $favorite;
        $this->company = $company;
        $this->blog = $blog;
    }
    public function favorite(Request $request)
    {
        if($request->ajax()){
            $user = $this->favorite->where("user_id",$request->idUser)
                ->where("company_id",$request->idCompany)->first();
          if($user){
              $user->delete();
              return response()->json(["status"=>200,"code"=>-1,"message"=>"Hủy thích công ty thành công"]);
          }
          $this->favorite->user_id = $request->idUser;
          $this->favorite->company_id = $request->idCompany;
          if($this->favorite->save()){
              return response()->json(["status"=>200,"code"=>1,"message"=>"Yêu thích công ty thành công"]);
          }
            return response()->json(["status"=>500,"code"=>500,"message"=>"Lỗi server !!! Xử lý thất bại"]);

        }
    }


    public function listPost(Request $request)
    {
        $posts  = $this->company->with("userPost","users","location")->paginate(16);
        return view("frontend.listPost.index",compact("posts"));
    }
    public function listCompany(Request $request){
        $companys  = $this->company->with("userPost","users","location")->paginate(16);
        return view("frontend.listCompany.index",compact("companys"));
    }
    public function search(Request $request){

        $textSearch = $request->textSearch;
        $textLocation = $request->textLocation;
        $dataSearch = (DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->join('company','company.id', '=', 'users.company_id'))
            ->join('locations', 'locations.id', '=', 'company.officeAddress')
            ->where("locations.id",function ($query)use($textLocation){
                $query->where("id",$textLocation);
            })
            ->where("posts.titlePost","like","%{$textSearch}%")->orWhere('company.nameCompany',"like","%{$textSearch}%")
            ->select('posts.titlePost','posts.id_post','company.nameCompany','company.logo', 'locations.name')
            ->paginate(15);
        return view("frontend.home.search",compact("dataSearch"));
    }

    public function lifeIT(Request $request){
        $blogs  = $this->blog->where("active","1")->paginate(16);
        return view("frontend.home.lifeIt",compact("blogs"));
    }
    public function detailLifeIT(Request $request,$id){
        $blog  = $this->blog->find($id);
        if($blog){
            return view("frontend.home.detailLifeIT",compact("blog"));
        }
        abort(500);
    }
}
