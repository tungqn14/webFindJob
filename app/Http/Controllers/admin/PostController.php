<?php

namespace App\Http\Controllers\admin;

use App\Helper\RecursiCategory;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Location;
use Illuminate\Http\Request;
use App\Model\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PostController extends Controller
{
    private $category;

    public function __construct(Categories $categories)
    {
        $this->category = $categories;
    }

  public function index(){
      $data = Posts::paginate(15);
      return view("postCensorship.index",compact('data'));
  }
    public function detail(Request $request,$id){

            if($id){
              //  $post = Posts::with("career.locations")->findOrFail($id);
                $post = Posts::with(['career' => function ($query) {
                    $query->whereIn('id_category', '=', 'career.id');
                }])->findOrFail($id);
              //  dd($post);
                return view("postCensorship.detail",compact('post'));
            }

    }



}
