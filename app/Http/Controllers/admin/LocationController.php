<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class LocationController extends Controller
{

    public function index(Request $request)
    {
       $response = Http::withOptions(['verify' => false])->get('https://provinces.open-api.vn/api/p/');
        if (Location::count() == 63){
            $data = Location::paginate(15);
            return view("admin.locations.index",compact('data'));
        }
        $locationsData = json_decode($response->getBody(),true);

        if($locationsData){
            foreach ( $locationsData as $item){
                $location = new Location();
                $location->name = $item['name'];
                $location->code = $item['code'];
                $location->division_type = $item['division_type'];
                $location->codename = $item['codename'];
                $location->phone_code = $item['phone_code'];
                $location->save();
            }
            $data = Location::paginate(15);
            return view("admin.locations.index",compact('data'));
  }
        else{
            return view("errors.403");
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.locations.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function delete($id)
    {

    }
}
