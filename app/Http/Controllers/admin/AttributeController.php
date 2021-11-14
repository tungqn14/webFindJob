<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Skill;
use App\Model\Welfare;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $welfare;
    protected $skill;
    public function __construct(Welfare $welfare, Skill $skill){
    $this->welfare = $welfare;
    $this->skill = $skill;
    }
    public function index(){
        $welfares = $this->welfare->latest()->paginate(15);
        $techs = $this->skill->latest()->paginate(15);

        return view("admin.attribute.index",compact('welfares','techs'));
    }
}
