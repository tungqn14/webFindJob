<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Model\Company;
use App\Model\CvSubmit;
use App\Model\Location;
use App\Model\Posts;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    protected $company;
    protected $post;
    protected $user;
    protected $cv;
    public function __construct(Company $company,Posts $post,User $user,CvSubmit $cv,Location $location)
    {

        $this->company = $company;
        $this->post = $post;
        $this->user = $user;
        $this->cv = $cv;
        $this->location = $location;
    }

    public function index()
    {
        $datas  = $this->post->with("users.company.location")->paginate(6);
        return response()->json([
            'datas'=>$datas,
            "status"=>200
        ]);

    }
    public function listAll()
    {
        $datas  = $this->post->with("users.company.location")->paginate(15);
        return response()->json([
            'datas'=>$datas,
            "status"=>200
        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        try {
            DB::beginTransaction();
            dd($request->except(['id_location','id_category']));

            $result  = Posts::create($request->except(['id_location','id_category']));



           if($result){
                return response()->json(['message' => 'Tạo bài viết thành công'], 201);
               DB::commit();
            }
           return response()->json(['message' => 'Tạo bài viết thất bại'], 500);
        }catch (\Exception $e){
            DB::rollBack();
            abort($e->getMessage(),500);
            return response()->json(['message' => 'Lỗi lưu bài viết thất bại'], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
